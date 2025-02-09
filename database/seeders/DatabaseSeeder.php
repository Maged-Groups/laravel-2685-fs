<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostStatus;
use App\Models\Reaction;
use App\Models\ReactionType;
use App\Models\Reply;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // users
        User::factory()->create([
            'name' => 'Maged Yaseen',
            'email' => 'magedyaseengroups@gmail.com',
            'mobile' => '01024750245',
            'roles' => 'admin',
            'password' => 'password',
        ]);

        User::factory(100)->create();

        // PostStatuses
        $post_status_types = [
            'Published',
            'Pending',
            'Postponed',
            'Private',
            'Cancelled',
            'Rejected',
        ];

        foreach ($post_status_types as $type) {
            PostStatus::create([
                'type' => $type
            ]);
        }

        // ReactionTypes
        $reaction_types = [
            'Like',
            'Love',
            'Angry',
            'Care',
            'Laugh',
            'Sad',
        ];

        foreach ($reaction_types as $type) {
            ReactionType::create([
                'type' => $type
            ]);
        }

        // Posts
        Post::factory(300)->create();


        // Comments
        Comment::factory(1800)->create();

        // Replies
        Reply::factory(5000)->create();

        // Reactions
        $count = 500;
        $i = 1;

        while ($i <= $count) {
            // Create random data
            $user_id = User::inRandomOrder()->first()->id; // 1
            $post_id = Post::inRandomOrder()->first()->id; // 1

            $reaction_type_id = ReactionType::inRandomOrder()->first()->id;

            // Check if the user and post is not exists
            $found = Reaction::where('user_id', '=', $user_id)
                ->where('post_id', '=', $post_id)
                ->count();

            if ($found == 0) {
                Reaction::create([
                    'user_id' => $user_id,
                    'post_id' => $post_id,
                    'reaction_type_id' => $reaction_type_id,
                ]);

                $i++;
            }
        }

    }
}
