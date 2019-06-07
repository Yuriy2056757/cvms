<?php

namespace App\Http\Controllers\Cvms;

use App\Article;
use App\Qualification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article, Request $request)
    {
        return view(
            'cvms.qualifications.create',
            compact('article', 'request')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, Request $request)
    {

        // Redirect if inputs are not valid
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_start' => 'required|date|before:date_end',
            'date_end' => 'required|date|after:date_start',
        ]);

        Qualification::create([
            'article_id' => $article->id,
            'title' => $request->title,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);

        return redirect(route('articles.show', $article));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Qualification $qualification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Qualification $qualification)
    {
        return view(
            'cvms.qualifications.edit',
            compact('article', 'qualification')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function update(
        Article $article,
        Qualification $qualification,
        Request $request
    ) {

        // Redirect if inputs are not valid
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date_start' => 'required|date|before:date_end',
            'date_end' => 'required|date|after:date_start',
        ]);

        $qualification->update([
            'title' => $request->title,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ]);

        return redirect(route('articles.show', $article));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qualification  $qualification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Qualification $qualification)
    {
        $qualification->delete();

        return back();
    }
}