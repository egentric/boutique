@extends('layouts.layoutAdmin')
@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Utilisateur</h3>

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->


                        <table class="table">
                            <tbody>
                                <tr>

                                    <th>Id</th>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr>
                                    <th>Pseudo</th>
                                    <td>{{$user->pseudo}}</td>
                                </tr>
                                <tr>
                                    <th>email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{$user->role->role}}</td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{$user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Prénom</th>
                                    <td>{{$user->firstName}}</td>
                                </tr>
                                <tr>
                                    <th>Adresse</th>
                                    <td>{{$user->adress}}</td>
                                </tr>
                                <tr>
                                    <th>Code Postal</th>
                                    <td>{{$user->zip}}</td>
                                </tr>
                                <tr>
                                    <th>Ville</th>
                                    <td>{{$user->city}}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    @if($user->picture)
                                    <td>
                                        <img src="/storage/uploads/{{$user->picture}}" alt="" width="100">
                                    </td>
                                    @endif
                                </tr>

                                <tr>
                                    <th>Action</th>
                                    <td><a href="{{ route('users.index')}}" class="btn btn-info btn-sm">Retour liste</a>
                                        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('users.destroy', $user->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection