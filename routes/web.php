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

// Route::view('/', 'Home')->name('my-home-page');

Route::get('/', function () {

    $app_name = 'My Application';

    $prices = [
        100000,
        50000,
        10000,
        5000,
        500,
        50,
        1000050,
    ];

    return view('home', compact('app_name', 'prices'));
});


Route::controller(PostController::class)->prefix('posts')->name('posts.')->group(function () {
    Route::get('deleted', 'deleted_posts')->name('deleted');
    Route::get('restore/{id}', 'restore_post')->name('restore');
});



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


Route::get('init', function () {


    // ////// Models
    // $models = [
    //     'User',
    //     'PostStatus',
    //     'ReactionType',
    //     'Post',
    //     'Reaction',
    //     'Comment',
    //     'Reply',
    // ];


    // foreach ($models as $model) {
    //     // php artisan make:controller NameController -r
    //     Artisan::call('make:model', ['name' => $model, '-a' => true]);

    //     sleep(1);
    // }


    // ////// Seeders

    // $seeders = [
    //     'UserSeeder',
    //     'PostStatusSeeder',
    //     'ReactionTypeSeeder',
    //     'PostSeeder',
    //     'ReactionSeeder',
    //     'CommentSeeder',
    //     'ReplySeeder',
    // ];

    // Artisan::call('migrate:fresh');

    // foreach ($seeders as $seeder) {

    //     Artisan::call('db:seed', ['--class' => $seeder]);
    // }
    return 'DONE';
});
