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
        <h1>Ventas Mensuales</h1>
        <div id="piechart"></div>
    </center>
    
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <?php
    foreach ($vars['listado'] as $item) {
        ?>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {'packages': ['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Grafica', 'Cantidades'],
                    ['Producto vendido', <?php echo $item[0] ?>],
                    ['Cantidad pagada de deudas', <?php echo $item[1] ?>],
                    ['Cantidad que deben de las deudas', <?php echo $item[2] ?>]
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {'title': 'Mensuales', 'width': 550, 'height': 400};

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
        <?php
    }
    ?>
        
        
</body>
</html>

<?php
require 'public/footer.php';
?>
