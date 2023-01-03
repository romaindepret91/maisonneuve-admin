<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $blogposts = Blogpost::getBlogposts();
        return view('blogposts.liste');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogposts.create');
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
                $blogpost = new Blogpost;
                $blogpost->fill([
                    'titre_fr'  => $request->titre,
                    'body_fr'   => $request->body,
                    'etudiants_id'  => Auth::user()->id
                ]);
                $blogpost->save();
                break;
            case 'en':
                $blogpost = new Blogpost;
                $blogpost->fill([
                    'titre'  => $request->titre,
                    'body'   => $request->body,
                    'etudiants_id'  => Auth::user()->id
                ]);
                $blogpost->save();
                break;
        }
        return redirect(route('blogposts'))->with('success', 'Post added with success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function show(Blogpost $blogpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogpost $blogpost)
    {
        return view('blogposts.edit', ['blogpost' => $blogpost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogpost $blogpost)
    {
        $request->validate(['lang' => 'required']);
        if(!$request->body && !$request->titre) {
            return view('blogposts.edit', ['blogpost' => $blogpost, 'lang' => $request->lang]);
        }
        else{
            if($request->lang == 'en')
                $blogpost->update([
                    'titre' => $request->titre,
                    'body'  => $request->body
                ]);
            elseif ($request->lang == 'fr')
                $blogpost->update([
                    'titre_fr'  => $request->titre,
                    'body_fr'   => $request->body
                ]);
            return redirect(route('blogposts'))->with('success', 'Post updated with success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogpost  $blogpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogpost $blogpost)
    {
        $blogpost->delete();

        return redirect(route('blogposts'))->with('success', 'Post deleted with success');
    }
}
