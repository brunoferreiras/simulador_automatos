@extends('layouts.menu')

@section('content')
    <section class="content-header">
        <h1>
            Criar Autômato
        </h1>
    </section>
    <form class="form-horizontal" role="form" action="{{ route('automatos.store') }}" method="POST">
        {{ csrf_field() }}
        @include('automatos.fields')
    </form>
@endsection