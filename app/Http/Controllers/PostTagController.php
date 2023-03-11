<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostTagController extends Controller
{
    public function index($tag)
    {
        $tag = Tag::findOrFail($tag);
        $mostCommented = Cache::tags(['blog-post'])->remember('mostCommented', 60, function () {
            return BlogPost::mostCommented()->take(5)->get();
        });

        $mostActive = Cache::remember('mostActive', 60, function () {
            return User::withMostBlogPosts()->take(5)->get();
        });

        $mostActiveLastMonth = Cache::remember('mostActiveLastMonth', 60, function () {
            return User::withMostBlogPostsLastMonth()->take(5)->get();
        });
        return view(
            'posts.index',
            [
                'posts' => $tag->blogPosts,
                'mostCommented' => $mostCommented,
                'mostActive' => $mostActive,
                'mostActiveLastMonth' => $mostActiveLastMonth,
            ]
        );
    }
}
