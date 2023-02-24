@extends('layouts.layoutAdmin')
@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Utilisateurs</h3>

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <!-- Tableau -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Pseudo</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>                                            
                                        @if($user->picture)
                                                <img src="/storage/uploads/{{$user->picture}}" alt="" width="25">
                                        @endif
                                    </td>
                                    <td>{{$user->pseudo}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->role}}</td>
                                   
                                    <td>
                                            <a href="{{ route('users.show', $user->id)}}" class="btn btn-success btn-sm">Voir</a>
                                            {{-- <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-primary btn-sm">Editer</a> --}}
                                        <form action="{{ route('users.destroy', $user->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection