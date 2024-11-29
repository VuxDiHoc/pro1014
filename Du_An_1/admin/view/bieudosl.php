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

<!-- <script type="text/javascript">
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
            echo "['{$value['name_cat']}', {$value['total_quantity']}]";
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
</script> -->
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart', 'bar']});  // Sử dụng 'corechart' để vẽ biểu đồ cột đứng
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
                $tongdm = count($thongkesk);
                $i = 1;
                foreach ($thongkesk as $key => $value) {
                    echo "['{$value['name_cat']}', {$value['total_quantity']}]";
                    if ($i < $tongdm) echo ",";
                    $i++;
                }
            ?>
        ]);

        // Tùy chỉnh biểu đồ cột đứng thẳng
        var options = {
            title: 'Số lượng sản phẩm theo danh mục',
            chartArea: {width: '40%'},  // Tăng chiều rộng của khu vực biểu đồ
            height: 500,  // Tăng chiều cao của biểu đồ
            hAxis: {
                title: 'Số lượng sản phẩm',
                minValue: 0,
                textStyle: {color: '#3e3e3e', fontSize: 14},  // Màu và kích thước chữ cho trục ngang
            },
            vAxis: {
                title: 'Danh mục',
                textStyle: {color: '#3e3e3e', fontSize: 14},  // Màu và kích thước chữ cho trục dọc
                slantedText: true,  // Làm chữ nghiêng để dễ đọc hơn
                slantedTextAngle: 0,  // Làm cho chữ thẳng
            },
            colors: ['#4CAF50'],  // Màu của các cột
            backgroundColor: '#f4f4f4',  // Màu nền của biểu đồ
            is3D: true,  // Hiệu ứng 3D
            animation: {
                startup: true,  // Bật hiệu ứng khi tải
                duration: 1000,
                easing: 'out',
            },
            bar: {groupWidth: '75%'},  // Độ rộng của cột
            legend: {position: 'none'},  // Ẩn legend
        };

        // Tạo biểu đồ cột đứng
        var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));  // Dùng ColumnChart để vẽ cột đứng
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