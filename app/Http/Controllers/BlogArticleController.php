<?php

namespace App\Http\Controllers;

use App\Models\BlogArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogposts = BlogArticle::getBlogArticles();
        return view('blogArticles.liste', ['blogposts' => $blogposts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogArticles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lang'          => 'required',
            'titre'         => 'required|min:2|max:100',
            'body'          => 'required',
        ]);
        $lang = $request->lang;
        switch($lang){
            case 'fr':
                $blogpost = new BlogArticle;
                $blogpost->fill([
                    'titre_fr'  => $request->titre,
                    'body_fr'   => $request->body,
                    'etudiants_id'  => Auth::user()->id
                ]);
                $blogpost->save();
                break;
            case 'en':
                $blogpost = new BlogArticle;
                $blogpost->fill([
                    'titre'  => $request->titre,
                    'body'   => $request->body,
                    'etudiants_id'  => Auth::user()->id
                ]);
                $blogpost->save();
                break;
        }
        return redirect(route('blogArticles.index'))->with('success', 'Post added with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogArticle  $blogArticle
     * @return \Illuminate\Http\Response
     */
    public function show(BlogArticle $blogArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogArticle  $blogArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogArticle $blogArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogArticle  $blogArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogArticle $blogArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogArticle  $blogArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogArticle $blogArticle)
    {
        $blogArticle->delete();

        return redirect(route('blogArticles.index'))->with('success', 'Post deleted with success');
    }
}
