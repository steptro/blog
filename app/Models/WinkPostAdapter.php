<?php


namespace App\Models;

use Wink\WinkPost;

class WinkPostAdapter extends WinkPost
{
    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'post_id');
    }
}
