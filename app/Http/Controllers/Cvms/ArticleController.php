<?php

namespace App\Http\Controllers\Cvms;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    // Redirect if inputs are not valid
    private function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'header_title' => 'required',
            'summary' => 'required',
            'seo_title' => 'required|max:70',
            'seo_description' => 'required|max:150',
            'image' => 'sometimes|file|image|max:5000',
            'display_name' => 'required',
            'display_subtitle' => 'required',
        ]);
    }

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
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $data = [
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => str_slug($request->slug),
            'header_title' => $request->header_title,
            'summary' => htmlentities($request->summary),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'display_name' => $request->display_name,
            'display_subtitle' => $request->display_subtitle,
            'is_active' => $request->has('is_active'),
            'robots' => $request->has('robots'),
        ];

        if ($request->has('image')) {

            // Append to data so we don't have to query twice
            $data['image'] = $request->image->store(
                'uploads/cvms',
                'public'
            );
        }

        Article::create($data);

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $experiences = $article->experiences;
        $qualifications = $article->qualifications;
        $skills = $article->skills;
        $contactInfos = $article->contactInfos;

        return view('cvms.articles.show', compact(
            'article',
            'experiences',
            'qualifications',
            'skills',
            'contactInfos'
        ));
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
    public function update(Article $article, Request $request)
    {
        $this->validateRequest($request);

        $data = [
            'name' => $request->name,
            'slug' => str_slug($request->slug),
            'header_title' => $request->header_title,
            'summary' => htmlentities($request->summary),
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'display_name' => $request->display_name,
            'display_subtitle' => $request->display_subtitle,
            'is_active' => $request->has('is_active'),
            'robots' => $request->has('robots'),
        ];

        if ($request->has('image')) {

            // Unlink the old image from storage
            if (Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            // Append to data so we don't have to query twice
            $data['image'] = $request->image->store(
                'uploads/cvms',
                'public'
            );
        }

        $article->update($data);

        return redirect(route('articles.show', $article));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        // Unlink the Article's image from storage
        if (Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return back();
    }
}