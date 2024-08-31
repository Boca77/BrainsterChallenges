<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Post;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user', 'category')->where('approved', '=', true)->get();

        return view('home', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function unApproved()
    {
        $posts = Post::with('user', 'category')->where('approved', '=', false)->get();

        return view('unapproved-posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();

        return view('add-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->except('image');
        $path = $request->file('image')->store('public/images');

        $data['image'] = $path;
        $data['user_id'] = auth()->user()->id;

        Post::create($data);

        return redirect()->route('home')
            ->with('success', 'Discussion successfully created! It needs to be approved before you dig into in thought!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = Comments::with('post', 'user')->where('post_id', '=', $post->id)->get();

        return view('show-post', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Categories::all();

        return view("edit-post", compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->except('image');
        $path = $request->file('image')->store('public/images');

        $data['image'] = $path;

        $post->update($data);

        return redirect()->route('home')->with('success', 'Successfully updated the selected discussion');
    }

    /**
     * Admin approves post
     */
    public function approve(Post $post)
    {

        $post->update(['approved' => true]);

        return redirect()->route('home')->with('success', 'Post successfully approved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home')->with('success', 'Successfully deleted the selected discussion');
    }
}
