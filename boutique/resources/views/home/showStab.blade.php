@extends('layouts.appVisiteur')
@section('content')
<div class="container py-5">
    <div class="cardTrans rounded shadow-sm p-5">

        <div class="row">

            <div class="col-md-7">
                <a href="{{ route('indexStab')}}" class="">Retour liste</a><br>

                @if($article->picture)
                <img src="/storage/uploads/{{$article->picture}}" alt="" width="90%">
                @endif
            </div>

            <div class="col-md-5">
                <div>
                    <h6 align="right">{{$article->brand}}</h6>
                </div>
                <div>
                    <h4>{{$article->nom}}</h4>
                </div>
                <div>
                    <h5>{{$article->price}} €</h5>
                </div>
                <div class="mt-5">
                    <form>
                        <div class="form-row align-items-center">
                            <div class="row">
                                    <div class="input-group-prepend mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Taille Disponible</label>
                                            <select class="custom-select" id="inputGroupSelect01">
                                                <option selected>Choix</option>
                                                    @foreach($article->sizes as $size)
                                                        <option value="{{ $size->sizeName }}">{{ $size->sizeName }}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                            </div>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-cart-plus"></i> Panier</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        

        <div class="row mt-5">
            <div class="col-md-12">
                <h6>Description :</h6>
                <P>{ html_entity_decode($article->description) }</P>
            </div>
        </div>
    </div>
</div>

@endsection