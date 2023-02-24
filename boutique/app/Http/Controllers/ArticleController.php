<?php

namespace App\Http\Controllers;

use App\Models\Sizes;
use App\Models\Promos;
use App\Models\Ranges;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $articles = Articles::all();
        $ranges = Ranges::all();
        $promos = Promos::all();


        return view('articles.index', compact('articles', 'ranges', 'promos'));
    }

    public function filtrerRange(Request $request)
    {
        $promos = Promos::all();
        $articles = Articles::all();

        // récup toutes les catégories
        $ranges = Ranges::all();
        // je récupére l'id sélectionner dans le filtre
        $range = $request->input('range');

        // dd($range);
        $articles = Articles::where('range_id', $range)->orderBy('range_id', 'desc')->get();
        
        return view('articles.index', compact('articles', 'ranges', 'promos'));
    }

    public function filtrerMarque(Request $request)
    {

        $articles = Articles::all();
        $ranges = Ranges::all();
        $promos = Promos::all();

        // je récupére la marque sélectionner dans le filtre
        $article = $request->input('brand');

        // dd($article);
        $articles = Articles::where('brand', $article)->orderBy('brand', 'desc')->get();
        
        return view('articles.index', compact('articles', 'ranges', 'promos'));
    }


// filtre promos marche pas car les nom sont idem

    // public function filtrerPromo(Request $request)
    // {
    //     // récup toutes les catégories
    //     $articles = Articles::all();
    //     $ranges = Ranges::all();
    //     $promos = Promos::all();
        
    //     // je récupére l'id sélectionner dans le filtre
    //     $promo = $request->input('promo');

    // // dd($promo);
    // $articles = DB::table('articles')
    // ->join('articles_promos', 'articles.id', '=', 'articles_promos.articles_id')
    // ->join('promos', 'promos.id', '=', 'articles_promos.promos_id')
    // ->join('ranges', 'articles.range_id', '=', 'ranges.id')
    // ->where('articles_promos.promos_id', '=', $promo)
    // ->get();

    // // $articles = DB::table('articles as a')
    // // ->join('articles_promos', 'a.id', '=', 'articles_promos.articles_id')
    // // ->join('promos', 'promos.id', '=', 'articles_promos.promos_id')
    // // ->join('ranges', 'a.range_id', '=', 'ranges.id')
    // // ->where('articles_promos.promos_id', '=', $promo)
    // // ->get();
    //     dd($articles);
    //     return view('articles.index', compact('articles', 'ranges', 'promos'));
    // }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ranges = Ranges::all();
        $sizes = Sizes::all();
        $promos = Promos::all();
        return view('articles.create', compact('ranges', 'sizes', 'promos'));
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
            'range_id' => 'required',
            'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $filename = "";
        if ($request->hasFile('picture')) {
        // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // On récupère l'extension du fichier, résultat $extension : ".jpg"
        $extension = $request->file('picture')->getClientOriginalExtension();
        // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
        $filename = $filenameWithExt. '_' .time().'.'.$extension;
        // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
        $request->file('picture')->storeAs('public/uploads', $filename);
        } else {
        $filename = Null;
        }


        $articles = Articles::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'price' => $request->price,
            'promoPrice' => $request->promoPrice,
            'size' => $request->size,
            'brand' => $request->brand,
            'range_id' => $request->range_id,
            'picture' => $filename

        ]);
        $articles->sizes()->attach($request->sizes);
        $articles->promos()->attach($request->promos);

        return redirect()->route('articles.index')
            ->with('success', 'Article ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Articles::findOrFail($id);
        $ranges = Ranges::all();
        $sizes = Sizes::all();
        $promos = Promos::all();

        $articleRange = $article->range;

        return view('articles.show', compact('article', 'ranges', 'articleRange', 'sizes', 'promos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Articles::findOrFail($id);
        $ranges = Ranges::all();
        $sizes = Sizes::all();
        $promos = Promos::all();

        $articleRange = $article->range;

        return view('articles.edit', compact('article', 'ranges', 'articleRange', 'sizes', 'promos'));
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
            'range_id' => 'required',
            'picture' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $filename = "";
        if ($request->hasFile('picture')) {
        // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // On récupère l'extension du fichier, résultat $extension : ".jpg"
        $extension = $request->file('picture')->getClientOriginalExtension();
        // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"
        $filename = $filenameWithExt. '_' .time().'.'.$extension;
        // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin/storage/app
        $request->file('picture')->storeAs('public/uploads', $filename);
        $updateArticle['picture'] = $filename;
         }
         //else {
        // $filename = Null;
        // }


        Articles::whereId($id)->update($updateArticle);
        Articles::findOrFail($id)->sizes()->sync($request->sizes);
        Articles::findOrFail($id)->promos()->sync($request->promos);

        return redirect()->route('articles.show', [$id])
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




// fonction pour le panier

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function addToCart($id)
    {
        $article = Articles::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $article->nom,
                "quantity" => 1,
                "price" => $article->price,
                "image" => $article->picture
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */

     public function updateBasket(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }




  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}

