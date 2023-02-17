@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des Promos</h3>

                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif

                        <a href="{{ route('promos.create')}}" class="btn btn-success btn-sm">Nouvelle promo</a>

                        <!-- Tableau -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date des promos</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promos as $promo)
                                <tr>
                                    <td>{{$promo->id}}</td>
                                    <td>{{$promo->nom}}</td>
                                    <td>{{$promo->promoDate}}</td>

                                    <td>
                                        <a href="{{ route('promos.edit', $promo->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                        <form action="{{ route('promos.destroy', $promo->id)}}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"" type=" submit">Supprimer</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection