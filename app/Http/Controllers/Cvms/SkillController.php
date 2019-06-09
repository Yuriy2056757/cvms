<?php

namespace App\Http\Controllers\Cvms;

use App\Article;
use App\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
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
            'cvms.skills.create',
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
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        Skill::create([
            'article_id' => $article->id,
            'title' => $request->title,
            'percentage' => $request->percentage,
        ]);

        return redirect(route('articles.show', $article));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, Skill $skill)
    {
        return view(
            'cvms.skills.edit',
            compact('article', 'skill')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(
        Article $article,
        Skill $skill,
        Request $request
    ) {

        // Redirect if inputs are not valid
        $request->validate([
            'title' => 'required',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $skill->update([
            'title' => $request->title,
            'percentage' => $request->percentage,
        ]);

        return redirect(route('articles.show', $article));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, Skill $skill)
    {
        $skill->delete();

        return back();
    }
}