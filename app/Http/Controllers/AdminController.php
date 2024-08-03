<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tag;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    use AuthorizesRequests;

    use ValidatesRequests;
    public function __construct()
    {
    }
    public function index()
    {

        $posts = Posts::with('user', 'tags')
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->cursorPaginate(3);
        return view('admin/dashboard', [
            'posts' => $posts,
            'title' => 'Main Dashboard',
        ]);
    }
    public function show($slug)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $post = Posts::where('slug', $slug)
            ->with('user')->firstOrFail();

        // check if user is authorized to view the post

        $this->authorize('view', $post);

        return view('admin.show', [
            'post' => $post,
            'title' => 'Show Details'
        ]);
    }
    public function create()
    {
        return view('admin/create');
    }
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'body' => 'required|max:10000',
            'tag' => 'nullable|string|max:255',
        ]);

        $title = $request->input('title');
        $slug = Str::slug($request->get('title')); // Generate the slug
        $image = $request->file('image');
        if ($image) {
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/postImages');
            $image->move($destinationPath, $name);
            $image_path = $name; // Store the image path
        } else {
            $image_path = null; // Set a default value if no image is uploaded
        }

        // Create or retrieve tag(s)
        if (!empty($request['tag'])) {
            $tags = explode(',', $request['tag']);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                $tagIds[] = $tag->id;
            }
        }


        $body = $request->input('body');

        $post = Posts::create([
            'user_id' => Auth::user()->id,
            'title' => $title,
            'image' => $image_path,
            'slug' => $slug,
            'body' => $body,
        ]);
        // Attach tags to the job if they exist
        if (!empty($tagIds)) {
            $post->tags()->attach($tagIds);
        }
        if ($post) {
            return redirect()->route('admin.index')->with(['success' => 'Post Created successfully']);
        }
    }
    public function update(Request $request, $id): RedirectResponse
    {
        // Retrieve the post
        $post = Posts::findOrFail($id);

        // Authorization check
        $this->authorize('update', $post);

        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'tags' => 'nullable|string|max:255',
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($post->image && Storage::exists('public/postImages/' . $post->image)) {
                    Storage::delete('public/postImages/' . $post->image);
                }

                // Store the new image
                $image = $request->file('image');
                if ($image) {
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/postImages', $name); // Store image in the public postImages directory
                    $validatedData['image'] = $name; // Set the image path without the folder name
                }
            } else {
                // Keep the existing image if no new image is uploaded
                $validatedData['image'] = $post->image;
            }

            // Update the post with validated data
            $post->update($validatedData);

            // Handle tags
            if (!empty($request['tag'])) {
                $tags = explode(',', $request['tag']);
                foreach ($tags as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
                    $tagIds[] = $tag->id;
                }
                // Sync tags to the post
                $post->tags()->sync($tagIds); // Sync tags to manage adding and removing // Sync tags to manage adding and removing
            } else {
                // Optional: If no tags are provided, you can choose to detach all tags
                // $post->tags()->detach();
            }

            return redirect()->route('admin.index')->with('success', 'Post updated successfully.');
        } catch (Exception $e) {
            // Log the exception
            Log::error('Failed to update post: ' . $e->getMessage());

            return redirect()->route('admin.index')->with('error', 'Failed to update the post.');
        }
    }


    public function edit($slug)

    {
        $post = Posts::where('slug', $slug)->with('user')->firstOrFail();
        $tagsString = $post->tags->pluck('name')->implode(', ');

        return view('admin.update', [
            'post' => $post,
            'tagsString' => $tagsString,
            'title' => 'Post edit'
        ]);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $post = Posts::findOrFail($id);

        // Authorization check
        $this->authorize('delete', $post);

        try {
            // Delete the image if it exists
            if ($post->image && Storage::exists('public/postImages/' . $post->image)) {
                Storage::delete('public/postImages/' . $post->image);
            }

            // Delete the post
            $post->delete();

            return redirect()->route('admin.index')->with('success', 'Post deleted successfully.');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Failed to delete post: ' . $e->getMessage());

            return redirect()->route('admin.index')->with('error', 'Failed to delete the post.');
        }
    }
}
