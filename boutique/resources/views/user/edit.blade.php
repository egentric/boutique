@extends('layouts..appVisiteur')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Mon Compte</h3>
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
                        <div class="pb-3">Modifier mes informations</div>

                        <!-- Formulaire -->
                        <form method="post" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Pseudo</label>
                                        <input required type="text" name="pseudo" class="form-control" value="{{ $user->pseudo }}" id='pseudo'>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>e-mail</label>
                                        <input required type="text" name="email" class="form-control" value="{{ $user->email }}" id='email'>
                                    </div>
                                
                            </div>
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>prénom</label>
                                        <input required type="text" name="firstName" class="form-control" value="{{ $user->firstName }}" id='firstName'>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input required type="text" name="name" class="form-control" value="{{ $user->name }}" id='name'>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <input required type="text" name="adress" class="form-control" value="{{ $user->adress }}" id='adress'>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
  
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Code Postale</label>
                                        <input required type="number" name="zip" class="form-control" value="{{ $user->zip }}" id='zip'>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input required type="text" name="city" class="form-control" value="{{ $user->city }}" id='city'>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="picture" class="form-label">Photo de profil</label>
                                <input type="file" class="form-control" name="picture" id="picture">
                                </div>
                            </div>
<br>
                            <button type="submit" class="btn btn-primary rounded-pillshadow-sm">Mettre à jour</button>
                        </form>

                        <form action="{{route('users.destroy', $user)}}" method="post">
                            @CSRF
                            @method('delete')
                            <button type="submit" class=" mt-3 btn btn-danger">Supprimer le compte</button>
                        </form>

                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection