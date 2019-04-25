<?php

namespace App\Http\Controllers;

use App\Article;

class ShowArticle extends Controller
{
    public function __invoke($slug)
    {

        // Cache the query for 10 seconds
        $article = Article::where('slug', $slug)->remember(10)->firstOrFail();

        // Show the Article resource if it's active
        if ($article->is_active) {
            return view('article', compact('article'));
        }

        abort(404);
    }
}