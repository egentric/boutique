@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter une Promo</h3>
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
                        <form method="POST" action="{{ route('promos.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Date de la promo</label>
                                <input type="text" name="promoDate" class="form-control">
                            </div>

                           
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                                Ajouter une promo </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection