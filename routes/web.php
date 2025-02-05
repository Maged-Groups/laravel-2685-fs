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

Route::resources(
    [
        'posts' => PostController::class,
        'commetns' => CommentController::class,
        'post-statuses' => PostStatusController::class,
        'reaction-types' => ReactionTypeController::class,
        'reactions' => ReactionController::class,
        'replies' => ReplyController::class,
        'users' => UserController::class,
    ]
);


// Route::get('init', function () {


//     $models = [
//         'User',
//         'PostStatus',
//         'ReactionType',
//         'Post',
//         'Reaction',
//         'Comment',
//         'Reply',
//     ];


//     foreach ($models as $model) {
//         // php artisan make:controller NameController -r
//         Artisan::call('make:model', ['name' => $model, '-a' => true]);

//         sleep(1);
//     }




//     return 'DONE';
// });
