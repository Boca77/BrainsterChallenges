<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Comments;

class CommentsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $post_id)
    {
        return view('add-comment', compact('post_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $request)
    {
        Comments::create($request->all());

        return redirect()->route('show.post', $request->input('post_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comment)
    {
        return view('edit-comment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentsRequest $request, Comments $comment)
    {
        $comment->update($request->all());

        return redirect()->route('show.post', $request->input('post_id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        $comment->delete();

        return redirect()->route('show.post', $comment->post_id);
    }
}
