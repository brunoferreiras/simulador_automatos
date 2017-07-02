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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- Pnotify -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.css">

		<!- VisJS -->
		<link href="http://visjs.org/dist/vis-network.min.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="../style.css" type="text/css">

        <style type="text/css">
            #myautomato {
                width: 100%;
                height: 600px;
                border: 1px solid lightgray;
            }
          
        </style>
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
	              <li><a href="{{ url('') }}">Página Inicial</a></li>
	              <li><a href="{{ route('automatos.index') }}">Autômatos</a></li>
	              <li><a href="{{ route('funcoes') }}">Funções dos Autômatos</a></li>
	              <li><a href="{{ route('operacoes') }}">Operações com Autômatos</a></li>
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
		<!-- VisJS -->
		<script src="http://visjs.org/dist/vis.js"></script>

        @yield('scripts')

        <!-- PNotify -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.0/pnotify.js"></script>
        @if( session()->has('success') )
            <script>
                $(document).ready(function() {
                    new PNotify({
                        title: "Sucesso",
                        type: "success",
                        text: '{{ session('success') }}',
                        addclass: 'success',
                        styling: 'bootstrap3',
                        hide: true,
                    });
                });
            </script>
        @endif

        @if( session()->has('error') )
            <script>
                $(document).ready(function() {
                    new PNotify({
                        title: "Erro!",
                        type: "error",
                        text: '{{ session('error') }}',
                        addclass: 'error',
                        styling: 'bootstrap3',
                        hide: true,
                    });
                });
            </script>
        @endif
    </body>
</html>
