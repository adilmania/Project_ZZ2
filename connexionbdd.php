<?php $connect = mysqli_connect("localhost", "root", "", "irsteasimple"); ?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Capteur Data Visualisation</title>

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
</head>

<body style="font-family:'Nunito'">
    <!-- Header -->
    <header>
        <div class="navbar-fixed">
            <!-- Dropdown Structure -->
            <div class="nav-wrapper">
                <nav class="white lighten-2 lighten-1" role="navigation">
                    <div class="nav-wrapper container">
                        <img src="img/logo.png" width="170">
                        <a href="#" class="brand-logo black-text">Visualisation Données Capteurs</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <!-- Sidenav -->
    <ul id="slide-out" class="side-nav fixed">
        <form method="post" style="margin-left: 10px; margin-right: 10px;">
            <br />
            <h6><b>Paramètre</h6></b>
            <select id="Param" name="Param" class="browser-default">
                <option value="" disabled selected>Choisissez votre option</option>
                <option value="battery">Batterie</option>
                <option value="temperature">Température</option>
                <option value="humidity">Humidité</option>
                <option value="light">Luminosité</option>
                <option value="decagon1">Decagon1</option>
                <option value="decagon2">Decagon2</option>
                <option value="decagon3">Decagon3</option>
                <option value="watermark1">Watermark1</option>
                <option value="watermark2">Watermark2</option>
                <option value="watermark3">Watermark3</option>
            </select>
            <br />
            <h6><b>Capteurs</h6></b>
            <select id="Capt" name="Capt[]" multiple>
                <option value="" disabled selected>Choisissez votre option</option>
                <option value="28-92-6D">28-92-6D</option>
                <option value="62-BE-6D">62-BE-6D</option>
                <option value="70-97-6D">70-97-6D</option>
                <option value="72-7E-6D">72-7E-6D</option>
                <option value="73-C1-6D">73-C1-6D</option>
                <option value="85-9A-6D">85-9A-6D</option>
                <option value="91-BC-6D">91-BC-6D</option>
                <option value="B3-C0-6D">B3-C0-6D</option>
                <option value="BA-9E-6E">BA-9E-6E</option>
                <option value="E7-A4-6D">E7-A4-6D</option>
            </select>
            <h6><b>Date Début</h6></b>
            <input name="dated" id="dated" type="date" class="validate">
            <br />
            <h6><b>Date Fin</h6></b>
            <input name="datef" id="datef" type="date" class="validate">
        </form>
        <button name="submit" value="submit" class="btn waves-effect waves-light" id="button" style="margin-left:65px;"
            onclick="drawChart()">Valider<i class="material-icons right">send</i></button>
        <button name="delete" class="btn waves-effect waves-light" id="delete"
            style="margin-top: 20px; margin-left:40px;" onclick="chart.clearChart()">Supprimer<i
                class="material-icons right">delete</i></button>
    </ul>

    <!-- Body -->
    <div class="wrapper">
        <div class="section no-pad-bot" id="index-banner">
        </div>
        <div id="chart"></div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/materialize.js"></script>
    <script> $(document).ready(function () { $('select').material_select(); }); // Init multiple selector </script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <!-- Chart -->
    <script type="text/javascript">
        var chart;
        google.load("visualization", "1", { packages: ["corechart"] });

        function drawChart() {
            var data1 = (
                [
                    ["X", "Chart 1"],
                    [1, 6],
                    [2, 5],
                    [3, 8],
                    [4, 2],
                    [5, 5],
                    [6, 5],
                    [7, 4],
                    [8, 8]
                ]);
            var dt1 = google.visualization.arrayToDataTable(data1);

            var data2 = new google.visualization.DataTable();
            data2.addColumn('number', 'X');
            data2.addColumn('number', 'Chart 2');

            data2.addRows([
                [1, 5],
                [3, 1],
                [4, 3],
                [5, 9],
                [6, 4],
                [8, 5],
                [9, 7],
                [11, 7],
                [16, 3]
            ]);


            var data3 = (
                [
                    ["X", "Chart 3"],
                    [1, 12],
                    [2, 10],
                    [3, 16],
                    [4, 4],
                    [5, 10],
                    [6, 8],
                    [7, 3],
                    [19, 4]
                ]);
            var dt3 = google.visualization.arrayToDataTable(data3);

            var joinedData = google.visualization.data.join(dt1, data2, 'full', [[0, 0]], [1], [1]);
            var joinedData2 = google.visualization.data.join(joinedData, dt3, 'full', [[0, 0]], [1, 2], [1]);

            var options = {
                fontName: 'Nunito',
                fontSize: 16,
                width: 1300,
                height: 700,
                interpolateNulls: true
            };
            chart = new google.visualization.LineChart(document.getElementById("chart"));
            chart.draw(joinedData2, options);

        }       
    </script>
</body>

<?php /* Fermeture de la connexion */ mysqli_close($connect); ?>

</html>