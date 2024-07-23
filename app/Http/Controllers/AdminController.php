<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tag;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    use ValidatesRequests;
    public function index()
    {
        $posts = Posts::with('user', 'tags')->orderBy('created_at', 'desc')->cursorPaginate(3);

        return view('admin/dashboard', [
            'posts' => $posts,
            'title' => 'Main Dashboard',
        ]);
    }
    public function show($slug)
    {
        $post = Posts::where('slug', $slug)->with('user')->firstOrFail();

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
        $this->validate($request, [
            'title' => 'required|string|max:50',
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
            'user_id' => 1,
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
    public function edit()
    {
    }

    public function delete()
    {
    }
}
