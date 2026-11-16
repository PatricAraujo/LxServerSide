@extends('layouts.fo')

@section('content')
    <h1>Olá, aqui podes Adicionar utilizadores</h1>

        <div class="container mt-4">
        <h2>Adicionar utilizadores</h2>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <div class="row">

                <div class="col-md-8">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    @error('name')
                        <p>Nome inválido</p>
                    @enderror

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
                    </div>
                    @error('password')
                        <p>Password inválido!</p>
                    @enderror

                    <div class="mb-3">
                        <label for="address" class="form-label">Morada (Address)</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    @error('address')
                        <p>Morada inválida</p>
                    @enderror

                    <div class="mb-3">
                        <label for="nif" class="form-label">NIF</label>
                        <input type="text" class="form-control" id="nif" name="nif">
                    </div>
                    @error('address')
                        <p>nif inválido</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Guardar</button>

                </div>
            </div>
        </form>
    </div>
@endsection
