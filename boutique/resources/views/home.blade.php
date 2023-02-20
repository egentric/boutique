@extends('layouts.appVisiteur')

@section('content')

@if (!session('connected'))
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                {{-- <div class="card-header">{{ __('Dashboard') }}
            </div> --}}

            <div class="card-body">
                {{-- @if (session('status'))
                <div role="alert">
                    {{ session('status') }}
                </div>
                @endif --}}

                {{ __('Vous êtes bien connecté!') }}
            </div>
            {{-- </div> --}}
        </div>
    </div>
<?php session(['connected' => true]); ?>
</div>
@endif

<div class="container bg-white" height='550px'>
    <div class="row justify-content-center">
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
</div>
@endsection