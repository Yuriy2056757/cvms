<?php

namespace App\Http\Controllers\Cvms;

use App\Article;
use App\ContactInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactInfoController extends Controller
{

    // Redirect if inputs are not valid
    private function validateRequest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    }

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
            'cvms.contact_infos.create',
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
        $this->validateRequest($request);

        ContactInfo::create([
            'article_id' => $article->id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('articles.show', $article));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactInfo $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article, ContactInfo $contactInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactInfo $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article, ContactInfo $contactInfo)
    {
        return view(
            'cvms.contact_infos.edit',
            compact('article', 'contactInfo')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactInfo $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function update(
        Article $article,
        ContactInfo $contactInfo,
        Request $request
    ) {
        $this->validateRequest($request);

        $contactInfo->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('articles.show', $article));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactInfo $contactInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        return back();
    }
}