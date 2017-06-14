@extends('layouts.menu')

@section('content')
	<div class="jumbotron">
		<h1>Simulador de Autômatos</h1>
		<p>Esse software foi desenvolvido com o intuito para aplicação dos conceitos de autômatos vistos na disciplina de Sistemas Embarcados 2 do curso de Engenharia de Telecomunicações do IFCE</p>
		<p>
		    <a class="btn btn-lg btn-primary" href="{{ route('automatos.index') }}" role="button">Cadastrar autômatos</a>
		</p>
	</div>
@endsection