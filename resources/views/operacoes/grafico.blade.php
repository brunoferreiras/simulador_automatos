<!doctype html>
<html>
<head>
    <title>vis.js Graph demo</title>
    <script src="http://visjs.org/dist/vis.js"></script>
    <link href="http://visjs.org/dist/vis-network.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        html, body {
            font: 10pt arial;
        }

        #mynetwork {
            width: 100%;
            height: 600px;
            border: 1px solid lightgray;
        }
    </style>
</head>

<body onload="draw()">
<div id="mynetwork"></div>

<script type="text/javascript">

//    var nodes = new vis.DataSet([
//        {id: 1, label: 'Node 1'},
//        {id: 2, label: 'Node 2'},
//        {id: 3, label: 'Node 3'},
//        {id: 4, label: 'Node 4'},
//        {id: 5, label: 'Node 5'},
//        {id: 6, label: 'Node 6'},
//        {id: 7, label: 'Node 7'},
//        {id: 8, label: 'Node 8'}
//    ]);
//
//    // create an array with edges
//    var edges = new vis.DataSet([
//        {from: 1, to: 8, arrows:'to', dashes:true},
//        {from: 1, to: 3, arrows:'to'},
//        {from: 1, to: 2, arrows:'to, from'},
//        {from: 2, to: 4, arrows:'to, middle'},
//        {from: 2, to: 5, arrows:'to, middle, from'},
//        {from: 5, to: 6, arrows:{to:{scaleFactor:2}}},
//        {from: 6, to: 7, arrows:{middle:{scaleFactor:0.5},from:true}}
//    ]);
//
//    // create a network
//    var container = document.getElementById('mynetwork');
//    var data = {
//        nodes: nodes,
//        edges: edges
//    };
//    var options = {};
//    var network = new vis.Network(container, data, options);

    var nodes = new vis.DataSet([
        {id: 1, value: '20', label: '0'},
        {id: 2, label: '1'},
        {id: 3, label: '2'},
        {id: 4, label: '3'}
    ]);

    // create an array with edges
    var edges = new vis.DataSet([
        {from: 1, to: 1, arrows:'to', label: 'a'},
        {from: 1, to: 2, arrows:'to', label: 'b'},
        {from: 2, to: 1, arrows:'to', label: 'a'},
        {from: 2, to: 4, arrows:'to', label: 'b'},
        {from: 2, to: 3, arrows:'to', label: 'c'},
        {from: 4, to: 1, arrows:'to', label: 'a'}
    ]);

    // create a network
    var container = document.getElementById('mynetwork');
    var data = {
        nodes: nodes,
        edges: edges
    };
    var options = {nodes: {
        shape: 'dot'
    }};
    var network = new vis.Network(container, data, options);

</script>
</body>
</html>