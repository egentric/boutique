@extends('layouts.appVisiteur')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Combinaisons</h3>
                        <div class="row  justify-content-between ">
                            @foreach($articles as $article)
                            @if($article->range->nom === 'Combinaison')
                                <div class="card mb-5" style="width: 18rem;">
                                <img src="/storage/uploads/{{$article->picture}}" alt="" width="100" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$article->nom}}</h5>
                                    <p class="card-text">{{$article->price}} €</p>
                                    <a href="{{ route('showCombi', $article->id)}}" class="btn btn-primary btn-sm">Détail</a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection