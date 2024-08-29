<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user', 'category')->get();

        return view('home', compact('posts'));
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

        return redirect()->route('home')->with('success', 'Successfully added a new discussion');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('show-post', compact('post'));
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
    public function update(Request $request, Post $post)
    {
        $data = $request->except('image');
        $path = $request->file('image')->store('public/images');
        $data['image'] = $path;

        $post->update($data);

        return redirect()->route('home')->with('success', 'Successfully updated the selected discussion');
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
