
<?php
include_once 'public/headerMenuP.php';
?>
<div class="container">
    <div class="row">
            <div class="col-md-12">
    <div id="piechart"></div>

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
                ['Task', 'Hours per Day'],
                   ['Total', <?php echo $item[1] ?>],
                ['Deben', <?php echo $item[0] ?>],
             
             
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title': 'Morosidad Mensual', 'width': 650, 'height': 400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>   
         <?php
                    
                   
                    }
                        ?>
</div>
</div>
</div>


<?php
include_once 'public/footer.php';
?>