@extends('layouts.menu')

@section('content')
    <h1 class="text-center">Visualizar o autômato</h1>
    @include('automatos.show_fields')
    <a href="{{ route('automatos.index') }}" class="btn btn-default">Voltar</a>
@endsection