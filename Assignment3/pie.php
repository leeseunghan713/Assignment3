<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pizza_ingredient";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "select * from pizza";
    $query2 = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($query2);

    $ingredient1 = $data['ingredient1'];
    $ingredient2 = $data['ingredient2'];
    $ingredient3 = $data['ingredient3'];
    $ingredient4 = $data['ingredient4'];
    $ingredient5 = $data['ingredient5'];


?>

<html>
  <head>
    <meta charset="utf8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['<?php echo "$ingredient1"; ?>',   20],
          ['<?php echo "$ingredient2"; ?>',   20],
          ['<?php echo "$ingredient3"; ?>',   20],
          ['<?php echo "$ingredient4"; ?>',   20],
          ['<?php echo "$ingredient5"; ?>',   20]
        ]);

        var options = {
          title: '나의 피자이야기'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

