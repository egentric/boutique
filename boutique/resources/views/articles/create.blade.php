@extends('layouts.layoutAdmin')
@section('content')


<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un Article</h3>
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
                        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Référence</label>
                                        <input type="text" name="size" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" name="nom" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    {{-- <input type="text" name="description" class="form-control"> --}}
                                    <textarea class="ckeditor form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">Prix</span></label>
                                        <div class="input-group">
                                            <input type="number" name="price" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label>Catégorie</label>
                                        <select name="range_id" class="form-select">
                                            <option value=""> --Catégorie-- </option>
                                            @foreach($ranges as $range)
                                            <option value="{{ $range->id }}">{{ $range->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label>Marque</label>
                                        <input type="text" name="brand" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <fieldset>
                                        <label>Tailles</label>
                                        @foreach ($sizes as $size)
                                        <div>
                                            <input type="checkbox" id="sizeName" name="sizes[]" value="{{ $size->id }}">
                                            <label for="{{ $size->sizeName }}">{{ $size->sizeName }}</label>
                                        </div>
                                        @endforeach
                                    </fieldset>
                                </div>
                                <div class="col-sm-4">
                                    <fieldset>
                                        <label>Promos</label>
                                        @foreach ($promos as $promo)
                                        <div>
                                            <input type="checkbox" id="nom" name="promos[]" value="{{ $promo->id }}">
                                            <label for="{{ $promo->nom }}">{{ $promo->nom }}</label>
                                        </div>
                                        @endforeach
                                    </fieldset>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group mb-4">
                                        <label>Prix Promo</label>
                                        <input type="number" name="promoPrice" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                            <div class="form-group col-sm-12">
                                <label for="picture" class="form-label">Photo de l'article</label>
                                <input type="file" class="form-control" name="picture" id="picture">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm shadow-sm mt-3">
                                Ajouter un article </button>
                                <a href="{{ route('articles.index')}}" class="btn btn-info btn-sm mt-3">Retour liste</a>

                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    @endsection