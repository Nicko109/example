<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts)->resolve();
    }

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();


    }

    public function update(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $post->update($data);
        $post->fresh();
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'post was deleted'
        ]);
    }


}
