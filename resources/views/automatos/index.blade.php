@extends('layouts.menu')

@section('content')
    <h1 class="text-center">Lista dos autômatos</h1>
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('automatos.create') }}">Cadastrar Autômato</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <th class="text-center">#</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Estados</th>
                <th class="text-center">Eventos</th>
                <th class="text-center">Relação estados e eventos</th>
                <th class="text-center">Estado inicial</th>
                <th class="text-center">Estados marcados</th>
                <th class="text-center" style="width: 150px;">Ações</th>
            </thead>
            <tbody>
            @forelse($automatos as $automato)
                <tr class="text-center">
                    <td>{{ $automato->id }}</td>
                    <td>{{ $automato->nome }}</td>
                    <td>{{ $automato->estados }}</td>
                    <td>{{ $automato->eventos }}</td>
                    <td>{{ $automato->relacao_estados_eventos }}</td>
                    <td>{{ $automato->estado_inicial }}</td>
                    <td>{{ $automato->estados_marcados }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route("automatos.show", ["id" => $automato->id]) }}"><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route("automatos.edit", ["id" => $automato->id]) }}"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                        <form id="form_del" style="display: inline;" method="POST" action="{{ route("automatos.destroy", ["id" => $automato->id]) }}">
                            {{ method_field("DELETE") }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="8">Nenhum autômato registrado!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection