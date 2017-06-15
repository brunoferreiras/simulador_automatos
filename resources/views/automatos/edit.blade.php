@extends('layouts.menu')

@section('content')
    <h1 class="text-center">Editar o autômato</h1>
    <form class="form-horizontal" role="form" action="{{ route('automatos.update', ['id' => $automato->id]) }}"
          method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @include('automatos.edit_fields')
    </form>
@endsection