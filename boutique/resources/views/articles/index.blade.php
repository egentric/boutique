@extends('layouts.layoutAdmin')
@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Articles</h3>

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <a href="{{ route('articles.create')}}" class="btn btn-success btn-sm mb-4">Nouvel article</a>

                        <!-- Tableau -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Référence</th>
                                    <th scope="col">Nom</th>
{{-- Sélection filtre catégorie --}}
                                    <th scope="col">
                                        <ul class="navbar-nav ms-auto">
                                            <li class="nav-item dropdown">
                                        
                                        <form method="POST" action="{{ route('articles.filtrerRange') }}">
                                            @csrf
                                            <div class="dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    Catégorie
                                                </a>
                                                
                                              <div class="dropdown-menu" aria-labelledby="rangeDropdown">
                                                @foreach($ranges as $range)
                                                  <button class="dropdown-item" type="submit" name="range" value="{{ $range->id }}">{{ $range->nom }}</button>
                                                @endforeach
                                              </div>
                                            </div>
                                          </form>
                                         
                                        </li>
                                    </ul></th>

 {{-- Sélection filtre Marque --}}
                                   
                                    <th scope="col">
                                        <ul class="navbar-nav ms-auto">
                                            <li class="nav-item dropdown">
                                        
                                        <form method="POST" action="{{ route('articles.filtrerMarque') }}">
                                            @csrf
                                                <div class="dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        Marque
                                                    </a>
                                                    
                                                    <div class="dropdown-menu" aria-labelledby="rangeDropdown">
                                                        @foreach($articles->pluck('brand')->unique() as $brand)
                                                        <button class="dropdown-item" type="submit" name="brand" value="{{ $brand }}">{{ $brand }}</button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                          </form>
                                         
                                            </li>
                                        </ul>
                                    </th>

 {{-- Sélection filtre promo --}}
                                   
                                    <th scope="col">
                                        {{-- <ul class="navbar-nav ms-auto">
                                            <li class="nav-item dropdown">
                                        
                                            <form method="POST" action="{{ route('articles.filtrerPromo') }}">
                                                @csrf
                                                <div class="dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
                                                        Promos
                                                    {{-- </a>
                                                    
                                                    <div class="dropdown-menu" aria-labelledby="rangeDropdown">
                                                        @foreach($promos as $promo)
                                                        <button class="dropdown-item" type="submit" name="promo" value="{{ $promo->id }}">{{ $promo->nom }}</button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                          </form>

                                             </li> --}}
                                        </ul>


                                    </th>
                                    
                                    <th scope="col">Action <a href="{{ route('articles.index')}}" class="btn btn-sm" style="background-color: var(--bs-danger-bg-subtle); --bs-border-color: var(--bs-danger-border-subtle); color: var(--bs-danger-text);">reset filtre</a>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    {{-- <td>{{$article->id}}</td> --}}
                                    <td>{{$article->size}}</td>
                                    <td>{{$article->nom}}</td>
                                    {{-- <td>{{$article->description}}</td> --}}
                                    {{-- <td>{{$article->price}}</td> --}}
                                    <td>{{$article->range->nom}}</td>
                                    <td>{{$article->brand}}</td>
                                    {{-- <td>
                                        <ul>
                                            @foreach($article->sizes as $size)
                                            <li>{{ $size->sizeName }}</li>
                                            @endforeach
                                        </ul>
                                    </td> --}}
                                    <td>
                                        <ul>
                                            @foreach($article->promos as $promo)
                                            <li>{{ $promo->nom }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    {{-- <td>
                                        <ul>
                                            @foreach($article->promos as $promo)
                                            <li>{{ $promo->promoDate }}</li>
                                            @endforeach
                                        </ul>
                                    </td> --}}

                                    {{-- <td>{{$article->promoPrice}}</td> --}}
                                    <!-- <td>{{$article->picture}}</td> -->
                                    <td>
                                            <a href="{{ route('articles.show', $article->id)}}" class="btn btn-success btn-sm">Voir</a>
                                            {{-- <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-primary btn-sm">Editer</a> --}}
                                        <form action="{{ route('articles.destroy', $article->id)}}" method="POST" style="display: inline-block">
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