<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Ranges;

class RangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ranges = Ranges::all();
        return view('ranges.index', compact('ranges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ranges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            ]);

           Ranges::create([
                'nom' => $request->nom,
            ]);

            return redirect()->route('ranges.index')
->with('success', 'Catégorie ajouté avec succès !');
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
        $range = Ranges::findOrFail($id);
        return view('ranges.edit', compact('range'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateRange = $request->validate([
            'nom' => 'required',
            ]);

            Ranges::whereId($id)->update($updateRange);
                return redirect()->route('ranges.index')
                ->with('success', 'La catégorie est mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $range = Ranges::findOrFail($id);
        $range->delete();
        return redirect('/ranges')->with('success', 'Catégorie supprimé avec succès');
    }
}
