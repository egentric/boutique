<?php

namespace App\Http\Controllers;

use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Sizes::all();
return view('sizes.index', compact('sizes'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sizeName' => 'required'
            ]);

            Sizes::create([
                'sizeName' => $request->sizeName,
            ]);

            return redirect()->route('sizes.index')
                            ->with('success', 'Taille ajouté avec succès !');
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
        $size = Sizes::findOrFail($id);
        return view('sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateSize = $request->validate([
            'sizeName' => 'required'
            ]);
            Sizes::whereId($id)->update($updateSize);
            return redirect()->route('sizes.index')
            ->with('success', 'La taille est mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Sizes::findOrFail($id);
        $size->delete();
        return redirect('/sizes')->with('success', 'La taille supprimé avec succès');
    }
}
