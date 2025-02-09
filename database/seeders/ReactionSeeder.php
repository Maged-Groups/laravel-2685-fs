<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Reaction;
use App\Models\ReactionType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

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
