<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'required|max:40',
            'email' => 'required|string',
            'firstName' =>'nullable|string',
            'name' =>'nullable|string',
            'adress' =>'nullable|string',
            'zip' =>'nullable',
            'city' =>'nullable|string',
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
        $user->picture = $filename;
        } 
        // else {
        // $filename = Null;
        // }

        // User::whereUser($user)->update($updateUser);

        //on modifie les infos de l'utilisateur
        $user->pseudo = $request->input('pseudo');
        $user->email = $request->input('email');
        $user->firstName = $request->input('firstName');
        $user->name = $request->input('name');
        $user->adress = $request->input('adress');
        $user->zip = $request->input('zip');
        $user->city = $request->input('city');
        

        //on sauvegarde les changements en bdd
        $user->save();

        //on redirige sur la page précédente
        return redirect()->route('/')
            ->with('message', 'Le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //on vérifie que c'est bien l'utilisateur connecté qui fait la demande de suppression
        //(les id doivent être identique)
        if (Auth::user()->id == $user->id){
            $user->delete();    //on réalise la supression
            return redirect()->route('/')
                ->with('message', 'Le compte a été supprimé');      
        }else{
            return redirect()->back()
                ->withErrors(['erreur' => 'Suppression du compte impossible']);      
        }
    }
}
