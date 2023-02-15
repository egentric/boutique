<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Articles;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $articles = Articles::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'price' => 'required',
            'promoPrice' => 'sometimes',
            'size' => 'sometimes',
            'brand' => 'required',
            ]);

           Articles::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'price' => $request->price,
                'promoPrice' => $request->price,
                'size' => $request->price,
                'brand' => $request->brand,
            ]);

            return redirect()->route('articles.index')
->with('success', 'Article ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Articles::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateArticle = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'price' => 'required',
            'promoPrice' => 'sometimes',
            'size' => 'sometimes',
            'brand' => 'required',
            ]);

            ArticleS::whereId($id)->update($updateArticle);
                return redirect()->route('articles.index')
                ->with('success', 'L\'article est mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Articles::findOrFail($id);
$article->delete();
return redirect('/articles')->with('success', 'Article supprimé avec succès');
    }
}
