<?php

namespace App\Http\Controllers\Cvms;

use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('user_id', auth()->id())->get();

        return view('cvms.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvms.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Article::create([
            'user_id' => auth()->id(),
            'name' => request('name'),
            'slug' => str_slug(request('slug')),
            'header_title' => request('header_title'),
            'summary' => request('summary'),
            'seo_title' => request('seo_title'),
            'seo_description' => request('seo_description'),
            'is_active' => request()->has('is_active'),
        ]);

        return redirect('/cvms/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('cvms.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('cvms.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article)
    {
        $article->update([
            'name' => request('name'),
            'slug' => str_slug(request('slug')),
            'header_title' => request('header_title'),
            'summary' => request('summary'),
            'seo_title' => request('seo_title'),
            'seo_description' => request('seo_description'),
            'is_active' => request()->has('is_active'),
        ]);

        return redirect('/cvms/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/cvms/articles');
    }
}