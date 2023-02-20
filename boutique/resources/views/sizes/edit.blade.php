@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="cardTrans rounded shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Editer une Taille</h3>
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

                        <!-- Formulaire -->
                        <form method="post" action="{{ route('sizes.update', $size->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Taille</label>
                                <input type="text" name="sizeName" class="form-control" value="{{ $size->sizeName }}">
                            </div>
                            <br>
                            <a href="{{ route('sizes.index')}}" class="btn btn-info btn-sm">Retour liste</a>
                            <button type="submit" class="btn btn-primary btn-sm rounded-pillshadow-sm">Mettre à jour</button>
                        </form>

                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection