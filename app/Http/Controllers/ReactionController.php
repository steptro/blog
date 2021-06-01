<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use App\Models\WinkPostAdapter;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function addReaction(WinkPostAdapter $winkPost, string $type, Request $request)
    {
        $types = ['like', 'love'];

        if (!in_array($type, $types)) {
            abort(400, "Reaction type not allowed");
        }

        $reaction = Reaction::where('post_id', $winkPost->id)->where('type', $type)->where('ip', $request->ip())->first();

        if ($reaction === null) {
            $reaction = new Reaction([
                'post_id' => $winkPost->id,
                'type' => $type,
                'ip' => $request->ip()
            ]);

            $reaction->save();
        } else {
            abort(400, "Already gave a reaction to this post");
        }
    }
}
