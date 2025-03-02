<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostStatusResource;
use App\Models\PostStatus;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withCount(['comments', 'reactions'])->with('user')->get();


        $ready_posts = PostResource::collection($posts);

        return view('posts.index', compact('ready_posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_statuses = get_post_statuses();

        return view('posts.create', compact('post_statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Another method to valdiate (NOT RECOMENDED)

        // $validated = $request->validate(
        //     [
        //         'title' => 'required|min:3|max:200',
        //         'body' => ['required', 'min:20', 'max:200'],
        //         'post_status_id' => 'required|exists:post_statuses,id',
        //     ]
        // );

        // return $validated;
        $data = $request->validated(); // return array of ONLY validated fields

        $data['user_id'] = 1;

        // return $data;

        $new_post = Post::create($data); // return an object instance from Post model

        if ($new_post) {
            return redirect()->route('posts.show', $new_post)->with('success', 'Post Created Successfully');
        } else {
            return redirect()->route('posts.create')->with('error', 'Cannot Creat the Post');
        }

        // return $data['title']; // Array
        // return $data->title; // Object (instance from class)
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {


        $post = $post->load(['comments.user', 'reactions', 'post_status']);
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
        $post_statuses = get_post_statuses();


        return view('posts.edit', compact('post', 'post_statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        // Save updates

        if ($post->update($data))
            return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully');

        return redirect()->route('posts.edit', $post)->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->post_status_id = 7;
        $post->save();

        if ($post->delete())
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');

        return redirect()->route('posts.show', $post)->with('success', 'Cannot delete the post!');

    }

    public function deleted_posts()
    {
        $posts = Post::onlyTrashed()->get();

        $ready_posts = PostResource::collection($posts);

        return view('posts.index', compact('ready_posts'));
    }

    public function restore_post($id)
    {
        $post = Post::withTrashed()->find($id);

        if ($post->restore())
        return redirect()->route('posts.show', $post)->with('success', 'Post restored!');

        return redirect()->route('posts', $post)->with('error', 'Cannot restore the post!');

    }
}
