<?php
require 'public/headerMenuP.php';
$uno;
$dos;
$tres;
?>

<!DOCTYPE html>
<html lang="en-US">
    <body>
    <center>
        <h1>Ventas Diarias</h1>
        <div id="piechart2"></div>
    </center>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Grafica', 'Cantidades'],
                    ['ASUS VIVOBOOK X512FA - CORE I5 8265U - 8GB', 1],
                    ['ASUS X509J - CORE I3 1005G1 - 4 GB', 3],
                    ['IMEXX - MOUSE WIRELESS - ROJO', 2],
                    ['IMEXX - MOUSE WIRELESS - AZUL',2],
                    ['REDRAGON K503 HARPE RGB',2],
                    ['ASROCK A320M-HDV R4.0', 2]
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {'title': 'Mensuales', 'width': 550, 'height': 400};

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                chart.draw(data, options);
            }
        </script>
  
</body>
</html>

<?php
require 'public/footer.php';
?>
