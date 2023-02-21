@extends('layouts.appVisiteur')
@section('content')
<div class="container py-5">
    <div class="cardTrans rounded shadow-sm p-5">
        <div class="row">

            <div class="col-md-8">
                @if($article->picture)
                <img src="/storage/uploads/{{$article->picture}}" alt="" width="500">
                @endif
            </div>
            <div class="col-md-4">
                <div>
                    <h6 align="right">{{$article->brand}}</h6>
                </div>
                <div>
                    <h4>{{$article->nom}}</h4>
                </div>
                <div>
                    <h5>{{$article->price}} €</h5>
                </div>
                <div>
                    <form>
                        <div class="form-row align-items-center">
                            <div class="form-group">
                                <label>Taille Disponible</label>
                                <select class="custom-select mr-sm-2" id="taille">
                                    <option selected>Taille</option>
                                    @foreach($article->sizes as $size)
                                    <option value="{{ $size->sizeName }}">{{ $size->sizeName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary btn-sm">Panier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h6>Description :</h6>
                <P>{{$article->description}}</P>
            </div>
        </div>
    </div>
</div>













<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Article</h3>

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
                                    <td>{{$article->id}}</td>
                                </tr>
                                <tr>
                                    <th>Référence</th>
                                    <td>{{$article->size}}</td>
                                </tr>
                                <tr>
                                    <th>Nom</th>
                                    <td>{{$article->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{$article->description}}</td>
                                </tr>
                                <tr>
                                    <th>Prix</th>
                                    <td>{{$article->price}}</td>
                                </tr>
                                <tr>
                                    <th>Catégorie</th>
                                    <td>{{$article->range->nom}}</td>
                                </tr>
                                <tr>
                                    <th>Marque</th>
                                    <td>{{$article->brand}}</td>
                                </tr>
                                <tr>
                                    <th>Taille</th>
                                    <td>
                                        <ul>
                                            @foreach($article->sizes as $size)
                                            <li>{{ $size->sizeName }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Promos</th>
                                    <td>
                                        <ul>
                                            @foreach($article->promos as $promo)
                                            <li>{{ $promo->nom }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Dates Promos</th>
                                    <td>
                                        <ul>
                                            @foreach($article->promos as $promo)
                                            <li>{{ $promo->promoDate }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Prix Promo</th>
                                    <td>{{$article->promoPrice}}</td>
                                </tr>

                                <tr>
                                    <th>Visuel</th>
                                    @if($article->picture)
                                    <td>
                                        <img src="/storage/uploads/{{$article->picture}}" alt="" width="100">
                                    </td>
                                    @endif
                                </tr>


                                <tr>
                                    <th>Action</th>
                                    <td><a href="{{ route('articles.index')}}" class="btn btn-info btn-sm">Retour liste</a>
                                        <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('articles.destroy', $article->id)}}" method="POST" style="display: inline-block">
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