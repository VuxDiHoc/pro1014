<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>



<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php'?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- code ở đây -->
                 

<div class="container-fluid">

<!-- Page Heading -->

<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">BIỂU ĐỒ</h1>
<div id="piechart"></div></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    var data = google.visualization.arrayToDataTable([
    ['Danh mục', 'Số lượng sản phẩm'],
    <?php
        $tongdm=count($thongkesk);
        $i=1;
        foreach ($thongkesk as $key => $value) {
            echo "['{$value['name_cat']}', {$value['countsp']}]";
            if($i<$tongdm) echo ",";
            $i++;
        }
    ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'width':1270, 'height':550};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

                 
            </div>
             
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>