@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Articles</h3>

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif
                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Prix Promo</th>
                                    <th scope="col">Taille</th>
                                    <th scope="col">Marque</th>
                                    <!-- <th scope="col">Image</th> #} -->
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->nom}}</td>
                                    <td>{{$article->description}}</td>
                                    <td>{{$article->price}}</td>
                                    <td>{{$article->promoPrice}}</td>
                                    <td>{{$article->size}}</td>
                                    <td>{{$article->brand}}</td>
                                    <!-- <td>{{$article->picture}}</td> -->
                                    <td>
                                        <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('articles.destroy', $article->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection