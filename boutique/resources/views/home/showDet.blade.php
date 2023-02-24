@extends('layouts.appVisiteur')
@section('content')
<div class="container py-5">
    <div class="cardTrans rounded shadow-sm p-5">
        <div class="row">

            <div class="col-md-8">
                <a href="{{ route('indexStab')}}" class="">Retour liste</a><br>

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
                <div class="mt-5">
                    <form>
                        <div class="form-row align-items-center">
                            <div class="row">
                                
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">quantité</span></label>
                                    <input type="number" name="quantity" class="form-control" value="">
                                </div>
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-cart-plus"></i> Panier</button>
                            </div>
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

@endsection