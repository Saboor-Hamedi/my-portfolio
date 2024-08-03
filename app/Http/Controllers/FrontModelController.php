<?php

namespace App\Http\Controllers;

use App\Models\FrontModel;
use App\Models\Posts;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class FrontModelController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with('user', 'tags')
            ->latest()
            ->cursorPaginate(3);
        return view('index', [
            'posts' => $posts,
            'title' => 'Home',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // check if user is logged in 
        // if (!auth()->check()) {
        //     return redirect()->route('login')->with('error', 'Please login first.');
        // }
        // Eager load the 'user' relation only once for both the main post and other posts
        $post = Posts::with('user')->where('slug', $slug)->firstOrFail();

        $otherPosts = Posts::with(['user', 'tags'])
            ->where('slug', '<>', $slug)
            ->latest()
            ->cursorPaginate(3);

        // $this->authorize('view', $post);
        // Debugging
        if ($otherPosts->isEmpty()) {
            logger('No other posts found.');
        }

        return view('posts.show', [
            'post' => $post,
            'otherPosts' => $otherPosts,
            'title' => 'Show Details'
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FrontModel $frontModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FrontModel $frontModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FrontModel $frontModel)
    {
        //
    }
}
