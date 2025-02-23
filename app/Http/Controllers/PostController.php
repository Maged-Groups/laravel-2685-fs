<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostStatusResource;
use App\Models\PostStatus;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();

        $ready_posts = PostResource::collection($posts);

        return view('posts.index', compact('ready_posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_statuses = PostStatus::orderBy('type')->get();

        $post_statuses = PostStatusResource::collection($post_statuses);


        return view('posts.create', compact('post_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
       return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $qry SELECT * FROM posts WHERE id = 55;
        // $res = self::$db->query($qry);
        // $post = mysqli_fetch_object($res);

        // $post = Post::with('post_status')->first();
        // $qry SELECT * FROM posts INNER JOIN post_statuses ON post_statuses.id = psots.post_status_id WHERE id = 55;
        // $res = self::$db->query($qry);
        // $post = mysqli_fetch_object($res);


        // return $post->post_status_id;

        $post = $post->load('post_status');
        // $qry_status = SELET * FROM post_statuses WHERE id = 6
        // $res_status = self::$db->query($qry_status);
        // $post_status = mysqli_fetch_object($res_status);

        $post = PostResource::make($post);
        return view('posts.show', compact('post'));


    }

    public function show_with_id($id)
    {
        // $qry SELECT * FROM posts WHERE id = 55;
        // $res = self::$db->query($qry);
        // $post = mysqli_fetch_object($res);

        $post = Post::with('post_status')->first();
        // $qry SELECT * FROM posts INNER JOIN post_statuses ON post_statuses.id = psots.post_status_id WHERE id = 55;
        // $res = self::$db->query($qry);
        // $post = mysqli_fetch_object($res);


        return $post;


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
