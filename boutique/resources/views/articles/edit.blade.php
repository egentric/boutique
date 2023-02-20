@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer un article</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->

                        <!-- Formulaire -->
                        <form method="post" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Référence</label>
                                        <input type="text" name="size" class="form-control" value="{{ $article->size }}">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control" value="{{ $article->nom }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ $article->description }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control" value="{{ $article->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label for='range_id'>Catégorie</label>
                                        <select name="range_id" id='range_id' class="form-select">
                                            @foreach ($ranges as $range)
                                            <option value="{{ $range->id}}" {{ $articleRange && $articleRange->id == $range->id ? 'selected' : ''}}>{{ $range->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label>Marque</label>
                                        <input type="text" name="brand" class="form-control" value="{{ $article->brand }}">
                                    </div>
                                </div>

                               
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <fieldset>
                                        <label>Tailles</label>

                                        @foreach ($sizes as $key=>$size)

                                        <div>
                                            <input type="checkbox" id="sizeName" name="sizes[]" value="{{ $size->id }}" {{ $article->sizes->contains($size->id) ? 'checked' : '' }}>
                                            <label for="{{ $size->sizeName }}">{{ $size->sizeName }}</label>
                                        </div>
                                        @endforeach
                                    </fieldset>

                                </div>
                                <div class="col-sm-4">
                                    <fieldset>
                                        <label>Promos</label>

                                        @foreach ($promos as $key=>$promo)

                                        <div>
                                            <input type="checkbox" id="nom" name="promos[]" value="{{ $promo->id }}" {{ $article->promos->contains($promo->id) ? 'checked' : '' }}>
                                            <label for="{{ $promo->nom }}">{{ $promo->nom }}</label>
                                        </div>
                                        @endforeach
                                    </fieldset>

                                </div>
                               

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label>Prix Promo</label>
                                        <input type="number" name="promoPrice" class="form-control" value="{{ $article->promoPrice }}">
                                    </div>
                                </div>
                                <div class="row mt-3">

                                    <div class="form-group col-sm-12">
                                        <label for="picture" class="form-label">Photo de l'article</label>
                                        <input type="file" class="form-control" name="picture" id="picture">
                                        </div>
                                    </div>
        
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm rounded-pillshadow-sm mt-3">Mettre à jour</button>
                            <a href="{{ route('articles.show', $article->id)}}" class="btn btn-info btn-sm mt-3">Retour Fiche</a>

                        </form>
                    </div>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection