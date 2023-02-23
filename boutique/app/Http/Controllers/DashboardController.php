<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Sizes;
use App\Models\Promos;
use App\Models\Ranges;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::orderBy('created_at', 'desc')->take(3)->get();
        $ranges = Ranges::orderBy('created_at', 'desc')->take(3)->get();
        $sizes = Sizes::orderBy('created_at', 'desc')->take(3)->get();
        $promos = Promos::orderBy('created_at', 'desc')->take(3)->get();

        $users = User::orderBy('created_at', 'desc')->take(3)->get();
        $role = Role::all();

        return view('dashboard', compact('articles', 'ranges', 'users', 'sizes', 'promos', 'role'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
