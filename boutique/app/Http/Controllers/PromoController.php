<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Promos;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promos::all();
        return view('promos.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'promoDate' =>'required',
            ]);

            Promos::create([
                'nom' => $request->nom,
                'promoDate' =>$request->promoDate,
            ]);

            return redirect()->route('promos.index')
->with('success', 'Promo ajouté avec succès !');
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
        $promo = Promos::findOrFail($id);
        return view('promos.edit', compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatePromo = $request->validate([
            'nom' => 'required',
            'promoDate' =>'required',

            ]);

            Promos::whereId($id)->update($updatePromo);
                return redirect()->route('promos.index')
                ->with('success', 'La Promo est mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promo = Promos::findOrFail($id);
        $promo->delete();
        return redirect('/promos')->with('success', 'Promo supprimé avec succès');
    }
}
