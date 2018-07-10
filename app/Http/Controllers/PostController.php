<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;

class PostController extends Controller
{
    public function create(Request $request, Post $post)
    {
        $this->validate($request, [
           'body'=>'required|max:140',
        ]);
        $createPost = $request->user()->posts()->create([
            'body' => $request->body,
        ]);

        return response()->json($post->with('user')->find($createPost->id));
    }
    public function index(Request $request, Post $post)
    {
        $allPosts = $post->whereIn(
            'user_id',
            $request->user()->following()->lists('follower_id')->push($request->user()->id)
        )->with('user');
        $posts = $allPosts->orderBy('created_at', 'desc')
            ->take($request->get('limit', 20))
            ->get();
        return response()->json([
            'posts' => $posts,
            'total' => $allPosts->count(),
        ]);
    }
}
