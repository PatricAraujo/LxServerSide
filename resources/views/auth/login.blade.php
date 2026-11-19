@extends('layouts.fo')

@section('content')
    <h1>Login</h1>

        <div class="container mt-4">
        <h2>Adicionar utilizadores</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    @error('email')
                        <p>Email inválido ou já registado!</p>
                    @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <p>Esqueceu a senha ? Clique <a href="{{route('password.request')}}">aqui</a>!</p>
                    </div>
                    @error('password')
                        <p>Password inválido!</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>
        </form>
    </div>
@endsection
