{{-- inherit from view base --}}
@extends('dashboard')

{{-- create a section to specific code --}}
@section('content')
    @if (!is_null($generos))
        <table class="table table-striped" style="padding-top: 10px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th colspan="3" class="text-center">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($generos as $genero)
                    <tr>
                        <td>{{ $genero->nome }}</td>
                        <td>{{ $genero->descricao }}</td>
                        <td>{{ $genero->categoria }}</td>
                        <td>
                            <a class="nav-link text-primary" href="{{ route('generos.show', $genero->id) }}">Mostrar</a>
                        </td>
                        <td>
                            <a class="nav-link text-success" href="{{ route('generos.edit', $genero->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('generos.destroy', $genero->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="nav-link text-danger" type="submit">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-muted">Nenhum gênero foi encontrado!</h3>
    @endif
@endsection