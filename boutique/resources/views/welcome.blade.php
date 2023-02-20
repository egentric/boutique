@extends('layouts.appVisiteur')
@section('content')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="storage/uploads/aqualung-bcd-pro-hd-compact_1676886497.jpg" class="d-block w-80" alt="...">
      </div>
      <div class="carousel-item">
        <img src="storage/uploads/aqualung-ensemble-de-regulateur-leg3nd-elite-din_1676886945.jpg" class="d-block w-80" alt="...">
      </div>
      <div class="carousel-item">
        <img src="storage/uploads/aqualung-homme-bcd-pro-hd_1676886826.jpg" class="d-block w-80" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection     