<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
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
    // public function show(Posts $posts)
    // {
    //     $post = Posts::where('slug', $posts)->with('user')->firstOrFail();
    //     $otherPosts = Posts::with('user')
    //         ->where('slug', '!=', $posts) // Exclude the current post
    //         ->inRandomOrder()
    //         ->paginate(3);
    //     return view('posts.show', [
    //         'post' => $post,
    //         "otherPosts" => $otherPosts,
    //         'title' => 'Show Details'
    //     ]);
    // }
    public function show(Posts $posts)
    {
        return view('posts.show');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
