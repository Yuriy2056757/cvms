<?php

namespace App\Http\Controllers\Cvms;

use App\Article;
use Illuminate\Http\Request;
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
    $articles = Article::all();

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
  public function store(Request $request)
  {
    $article = new Article();

    $article->user_id = auth()->user()->id;
    $article->name = request('name');
    $article->slug = str_slug(request('slug'));
    $article->header_title = request('header_title');
    $article->summary = request('summary');
    $article->seo_title = request('seo_title');
    $article->seo_description = request('seo_description');

    $article->save();

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
    //
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
  public function update(Request $request, Article $article)
  {
    $article->name = request('name');
    $article->slug = str_slug(request('slug'));
    $article->header_title = request('header_title');
    $article->summary = request('summary');
    $article->seo_title = request('seo_title');
    $article->seo_description = request('seo_description');

    $article->save();

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
