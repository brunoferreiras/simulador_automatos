@extends('layouts.menu')

@section('content')
	<div class="jumbotron">
		<h1>Simulador de Autômatos</h1>
		<p>Esse software foi desenvolvido com o intuito para aplicação dos conceitos de autômatos vistos na disciplina de Sistemas Embarcados 2 do curso de Engenharia de Telecomunicações do IFCE</p>
		<p>
		    <a class="btn btn-lg btn-primary" href="{{ route('automatos.create') }}" role="button">Cadastrar autômatos</a>
		</p>
	</div>
	{{-- <footer class="text-center">
		<p>Desenvolvido por <a href="https://github.com/brunoferreiras">Bruno Ferreira</a> e <a href="https://github.com/brennolemos">Breno Lemos</a></p>
	</footer> --}}
@endsection