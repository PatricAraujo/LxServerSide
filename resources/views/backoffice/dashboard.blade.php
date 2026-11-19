@extends('layouts.fo')

@section('content')
    @auth
        <h1>Olá {{ Auth::user()->name }}</h1>
    @endauth

    @if (Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
            <div class="alert alert-success" role="alert">
                Bem-vindo {{ Auth::user()->name }}!
            </div>
    @endif

@endsection
