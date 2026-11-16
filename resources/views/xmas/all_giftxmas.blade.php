@extends('layouts.fo')

@section('content')
    <h5>Todas as tarefas</h5>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prenda</th>
                <th scope="col">Valor estimado</th>
                <th scope="col">Valor gasto</th>
                <th scope="col">Utilizador</th>
                <th scope="col">Diferença</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if (@isset($giftDB))
                @foreach ($giftDB as $gift)
                    <tr>
                        <th scope="row">{{ $gift->id }}</th>
                        <td>{{ $gift->name }}</td>
                        <td>{{ $gift->estimated_value }}</td>
                        <td>{{ $gift->spent_value }}</td>
                        <td>{{ $gift->user_name }}</td>

                        {{-- //esquema de cores para a diferença entre valor estimado e valor gasto --}}
                        <td>
                            @php
                                $val = $gift->estimated_value - $gift->spent_value;
                            @endphp

                            @if ($val < 0)
                                <span class="text-danger fw-bold">{{ $val }}</span>
                            @else
                                <span class="text-success fw-bold">{{ $val }}</span>
                            @endif
                        </td>

                        <td><a href="{{ route('xmas.update', $gift->id) }}" class="btn btn-info">Ver / Editar</a></td>
                        <td><a href="{{ route('xmas.delete', $gift->id) }}" class="btn btn-danger">Apagar</a></td>
                    </tr>
                @endforeach
            @endisset
    </tbody>
@endsection
