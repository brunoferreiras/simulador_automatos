<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simulador de Autômatos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

		<!-- Bootstrap -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	</head>
    <body>
        <div class="container">
	      <!-- Static navbar -->
	      <nav class="navbar navbar-default">
	        <div class="container-fluid">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="{{ url('') }}">Simulador de Autômatos</a>
	          </div>
	          <div id="navbar" class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	              <li class="active"><a href="#">Página Inicial</a></li>
	              <li><a href="#">Autômatos</a></li>
	              <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Funções dos Autômatos <span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="#">Linguagem Gerada</a></li>
	                  <li><a href="#">Linguagem Marcada</a></li>
	                  <li><a href="#">Parte Acessível</a></li>
	                  <li><a href="#">Parte CoAcessível</a></li>
	                  <li><a href="#">TRIM</a></li>
	                  <li><a href="#">Complemento</a></li>
	                </ul>
	              </li>
	              <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operações com Autômatos <span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="#">Composição Produto</a></li>
	                  <li><a href="#">Composição Paralela</a></li>
	                </ul>
	              </li>
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div><!--/.container-fluid -->
	      </nav>

	      
	      @yield('content')

	      <!-- Main component for a primary marketing message or call to action -->
	      
		
	    </div> <!-- /container -->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	    <!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
