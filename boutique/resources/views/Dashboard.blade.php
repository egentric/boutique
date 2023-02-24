@extends('layouts.layoutAdmin')
@section('content')

<div class="container py-5">
    @if ((Auth::user()->role->role) === 'admin')
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <a class="dropdown-item" href="{{ route('articles.index')}}">
            <div class="cardTrans rounded shadow-sm p-5 ms-3">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Articles</h3>
                        <!-- Tableau -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Marque</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->nom}}</td>
                                    <td>{{$article->range->nom}}</td>
                                    <td>{{$article->brand}}</td>
                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
            </a>
        </div>

            <div class="col-lg-3 mx-auto">
                <a class="dropdown-item" href="{{ route('ranges.index')}}">
                <div class="cardTrans rounded shadow-sm p-5 ms-2">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Catégories</h3>
                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ranges as $range)
                                    <tr>
                                        <td>{{$range->nom}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                        </div>
                    </div>
                </div>
                </a>
            </div>



            <div class="col-lg-2 mx-auto">
                <a class="dropdown-item" href="{{ route('sizes.index')}}">
                <div class="cardTrans rounded shadow-sm p-5 ms-3">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Tailles</h3>
    
                            <!-- Tableau -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Taille</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sizes as $size)
                                    <tr>
                                        <td>{{$size->sizeName}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Fin du Tableau -->
                        </div>
                    </div>
                </div>
                </a>

            </div>

    <div class="row">
        <div class="col-lg-6 mx-auto">
            <a class="dropdown-item" href="{{ route('promos.index')}}">
            <div class="cardTrans rounded shadow-sm p-5 ms-3 mt-3">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Promos</h3>

                        <!-- Tableau -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date des promos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promos as $promo)
                                <tr>
                                    <td>{{$promo->nom}}</td>
                                    <td>{{$promo->promoDate}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-6 mx-auto">
            <a class="dropdown-item" href="{{ route('users.index')}}">

                <div class="cardTrans rounded shadow-sm p-5 ms-3 mt-3">
                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <h3>Utilisateurs</h3>
    
                            <!-- Tableau -->
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">pseudo</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Role</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                            @if($user->picture)
                                            <td>
                                                <img src="/storage/uploads/{{$user->picture}}" alt="" width="25">
                                            </td>
                                            @endif
                                        <td>{{$user->pseudo}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{-- @dump($role); --}}
                                            {{ $user->role->role }}
                                            </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- Fin du Tableau -->
                        </div>
                    </div>
                </a>

            </div>


    </div>
    @else
    <div class="col-lg-6 mx-auto">
        <a class="dropdown-item" href="{{ route('users.edit', $user = Auth::user())}}"><a href="{{ route('users.edit', $user = Auth::user())}}">

            <div class="cardTrans rounded shadow-sm p-5 ms-3 mt-3">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Mon Compte</h3>

                        <!-- Tableau -->
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">pseudo</th>
                                    <th scope="col">email</th>

                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                        @if($user->picture)
                                        <td>
                                            <img src="/storage/uploads/{{$user->picture}}" alt="" width="25">
                                        </td>
                                        @endif
                                    <td>{{$user->pseudo}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                
                            </tbody>
                        </table>
                        </div>
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </a>
     </div>
    @endif
</div>
@endsection