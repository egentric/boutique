@extends('layouts.appVisiteur')
@section('content')
<div class="container py-5">
    <div class="cardTrans rounded shadow-sm p-5">
        <div class="row">

            <div class="col-md-7">
                <a href="{{ route('indexDet')}}" class="">Retour liste</a><br>

                @if($article->picture)
                <img src="/storage/uploads/{{$article->picture}}" alt="" width="90%">
                @endif
            </div>
            <div class="col-md-5">
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
                        <div class="col-auto my-1">
                            <a href="{{ route('add.to.cart', $article->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-cart-plus"></i> Panier</a>
                        </div>
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
<script src="//cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection

