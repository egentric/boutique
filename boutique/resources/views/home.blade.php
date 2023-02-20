@extends('layouts.appVisiteur')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes bien connecté!') }}
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
