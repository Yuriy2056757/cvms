<?php

namespace App\Http\Controllers;

use App\Article;

class ShowArticle extends Controller
{
    public function __invoke($slug)
    {

        // Cache the query for 10 seconds
        $article = Article::where('slug', $slug)->remember(10)->firstOrFail();

        // Get the experiences associated with the Article
        $experiences = $article->experiences;

        // Show the Article resource if it's active
        if ($article->is_active) {
            return view('article', compact('article', 'experiences'));
        }

        abort(404);
    }
}