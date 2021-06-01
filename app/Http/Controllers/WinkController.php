<?php

namespace App\Http\Controllers;

use App\Models\WinkPostAdapter;
use Wink\WinkPost;

class WinkController extends Controller
{
    public function index()
    {
        $posts = WinkPost::with('tags')
            ->live()
            ->orderBy('publish_date', 'DESC')
            ->simplePaginate(12);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = WinkPostAdapter::with('tags', 'reactions')
            ->live()
            ->whereSlug($slug)
            ->firstOrFail();


        $reactions = [];

        foreach ($post->reactions as $reaction) {
            if (!array_key_exists($reaction->type, $reactions)) {
                $reactions[$reaction->type] = 1;
            } else {
                $reactions[$reaction->type]++;
            }
        }

        return view('blog.show', compact(['post', 'reactions']));
    }

    public function preview($slug)
    {
        $post = WinkPost::with('tags')
            ->whereSlug($slug)
            ->firstOrFail();

        return view('blog.show', compact('post'));
    }

    public function page($slug)
    {
        $page = WinkPage::whereSlug($slug)
            ->firstOrFail();

        return view('page.show', compact('page'));
    }
}
