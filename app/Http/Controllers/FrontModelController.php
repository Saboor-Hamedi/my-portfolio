<?php

namespace App\Http\Controllers;

use App\Models\FrontModel;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class FrontModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::with('user')->paginate(6);
        return view('index', [
            'posts' => $posts,
            'title' => 'Posts',
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
        $post = Posts::where('slug', $slug)->with('user')->firstOrFail();
        $otherPosts = Posts::with('user')
            ->where('slug', '!=', $slug) // Exclude the current post
            ->inRandomOrder()
            ->paginate(3);
        return view('/posts.show', [
            'post' => $post,
            "otherPosts" => $otherPosts,
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
