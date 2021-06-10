<?php

namespace App\Http\Controllers;

use App\Models\Reaction;
use App\Models\WinkPostAdapter;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function addReaction(WinkPostAdapter $winkPost, Request $request)
    {
        $validator = $request->validate([
            'type' => ['required', 'in:like,love'],
            'deviceId' => ['required'],
        ]);

        $reaction = Reaction::where('post_id', $winkPost->id)->where('device_id', $request->get('deviceId'))->first();

        if ($reaction === null) {
            $reaction = new Reaction([
                'post_id' => $winkPost->id,
                'type' => $request->get('type'),
                'device_id' => $request->get('deviceId')
            ]);

            $reaction->save();
        } else {
            abort(400, "Already gave a reaction to this post");
        }
    }
}
