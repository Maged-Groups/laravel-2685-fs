<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{



    function user()
    {
        // this post belongs to user
        return $this->belongsTo(User::class);
    }

    function postStatus () {
        return $this->belongsTo(PostStatus::class);
    }


}
