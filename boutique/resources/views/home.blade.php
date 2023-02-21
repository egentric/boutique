@extends('layouts.appVisiteur')

@section('content')

<!-- @if (!session('connected'))
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                <div class="card-body">
                    {{ __('Vous êtes bien connecté!') }}
                </div>
            </div>
        </div>
        <?php session(['connected' => true]); ?>
    </div>
</div>
@endif -->

<div class="container py-5">
    <div class="row justify-content-center rounded bg-white">

        <div>
            <h2 align='center'>Promotions</h2>
        </div>
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="storage/uploads/aqualung-bcd-pro-hd-compact_1676886497.jpg" class="d-block mx-auto" alt="..." height='400px'>
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div> --}}
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="storage/uploads/aqualung-ensemble-de-regulateur-leg3nd-elite-din_1676886945.jpg" class="d-block mx-auto" alt="..." height='400px'>
                    {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div> --}}
                </div>
                <div class="carousel-item">
                    <img src="storage/uploads/aqualung-homme-bcd-pro-hd_1676886826.jpg" class="d-block mx-auto" alt="..." height='400px'>
                    {{-- <div class="carousel-caption d-none d-md-block height='400px'">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div> --}}
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div>

        <div class="container py-5"">
    <div class=" row">
            <div class="col-lg-10 mx-auto">
                <div class="cardTrans rounded shadow-sm p-5">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Articles</h3>
                            <div class="row  justify-content-between ">
                                @foreach($articles as $article)
                                <div class="card mb-5" style="width: 18rem;">
                                    <img src="/storage/uploads/{{$article->picture}}" alt="" width="100" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$article->nom}}</h5>
                                        <p class="card-text">{{$article->price}} €</p>
                                        <a href="{{ route('showCombi', $article->id)}}" class="btn btn-primary btn-sm">Détail</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection