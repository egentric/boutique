<?php

namespace App\Http\Controllers;

use App\Models\Sizes;
use App\Models\Promos;
use App\Models\Ranges;
use App\Models\Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Articles::all();
        return view('home', compact('articles'));
    }

    public function indexStab()
    {
        $articles = Articles::all();
        return view('home/indexStab', compact('articles'));
    }

    public function showStab(string $id)
    {
        $article = Articles::findOrFail($id);
        $ranges = Ranges::all();
        $sizes = Sizes::all();
        $promos = Promos::all();

        $articleRange = $article->range;

        return view('home/showStab', compact('article', 'ranges', 'articleRange', 'sizes', 'promos'));
    }

    public function indexDet()
    {
        $articles = Articles::all();
        return view('home/indexDet', compact('articles'));
    }

    public function showDet(string $id)
    {
        $article = Articles::findOrFail($id);
        $ranges = Ranges::all();
        $sizes = Sizes::all();
        $promos = Promos::all();

        $articleRange = $article->range;

        return view('home/showDet', compact('article', 'ranges', 'articleRange', 'sizes', 'promos'));
    }

    public function indexCombi()
    {
        $articles = Articles::all();
        return view('home/indexCombi', compact('articles'));
    }

    public function showCombi(string $id)
    {
        $article = Articles::findOrFail($id);
        $ranges = Ranges::all();
        $sizes = Sizes::all();
        $promos = Promos::all();

        $articleRange = $article->range;

        return view('home/showCombi', compact('article', 'ranges', 'articleRange', 'sizes', 'promos'));
    }
}
