@extends('layouts.menu')

@section('content')
    <div class="col-sm-12">
        <canvas id="springydemo" width="800" height="480"></canvas>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            var graph = new Springy.Graph();
            var layout = new Springy.Layout.ForceDirected(graph, 400.0, 400.0, 0.5);

            graph.addNodes('X1', 'X2');

            graph.addEdges(
                ['X1', 'X2', {color: '#00A0B0', label: 'Foo bar'}],
                ['X2', 'X1', {color: '#b06a61', label: 'Foo bar'}]
            );

            jQuery(function(){
                var springy = jQuery('#springydemo').springy({
                    graph: graph
                });
            });
        });
    </script>
@endsection