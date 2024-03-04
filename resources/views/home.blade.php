@extends('layouts.app')
//Bienveniida a los usuarios dependiendo del rol que estos tengan, ya sea admministradr o usuario.

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (auth()->user()->admin == 1) //Realiza una verificación para el rol de usuario
                    <div class="text-center">
                        <h3>Bienvenid@, eres administrador</h3>
                        <a href="{{ route('users') }}" class="btn btn-primary">Acceder a Usuarios</a>
                    </div>
                    @else
                    <div class="text-center">
                        <h3>Bienvenid@, lo siento pero NO eres administrador</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection