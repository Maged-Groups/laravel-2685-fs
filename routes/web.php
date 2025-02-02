<?php

use App\Http\Controllers\{
    CommentController,
    PostController,
    ReactionTypeController,
    PostStatusController,
    ReactionController,
    ReplyController,
    UserController,
};

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::resource('commetns', CommentController::class);
// Route::resource('posts', PostController::class);
// Route::resource('post-reactions', ReactionTypeController::class);
// Route::resource('post-statuses', PostStatusController::class);
// Route::resource('reactions', ReactionController::class);
// Route::resource('replies', ReplyController::class);
// Route::resource('users', UserController::class);

Route::get('posts/new', [PostController::class, 'new']);
Route::get('posts/today', [PostController::class, 'today']);
Route::get('posts/pending', [PostController::class, 'pending']);
Route::get('posts/from/{user_id}', [PostController::class, 'user_posts']);

Route::controller(PostController::class)->prefix('posts')->group(function () {
    Route::get('new', 'new');
    Route::get('today', 'today');
    Route::get('pending', 'pending');
    Route::get('from/{user_id}', 'user_posts');
});

Route::resources(
    [
        'commetns' => CommentController::class,
        'posts' => PostController::class,
        'post-reactions' => ReactionTypeController::class,
        'post-statuses' => PostStatusController::class,
        'reactions' => ReactionController::class,
        'replies' => ReplyController::class,
        'users' => UserController::class,
    ]
);


Route::get('init', function () {


    $models = [
        'Post',
        'Comment',
        'PostReaction',
        'PostStatus',
        'Reaction',
        'ReactionType',
        'Reply',
        'User',
    ];


    foreach ($models as $model) {
        // php artisan make:controller NameController -r
        Artisan::call('make:model', ['name' => $model, '-a' => true]);
    }




    return 'DONE';
});
