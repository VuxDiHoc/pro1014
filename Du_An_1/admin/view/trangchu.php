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
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row" style="height: 30%;">
                <!-- Phần trên (30% chiều cao) chia thành 4 row -->
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Nội dung cho row 1 -->
                            <h5 class="card-title">Row 1</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Nội dung cho row 2 -->
                            <h5 class="card-title">Row 2</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Nội dung cho row 3 -->
                            <h5 class="card-title">Row 3</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Nội dung cho row 4 -->
                            <h5 class="card-title">Row 4</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row dưới (70% chiều cao) chia thành 2 row -->
            <div class="row" style="height: 70%;">

                <!-- Row 1 trong phần dưới -->
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Số lượng sản phẩm theo danh mục</h6>
                        </div>
                        <div class="card-body">
                            <!-- Thêm biểu đồ tại đây -->
                            <div id="combo_chart" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Row 2 trong phần dưới -->
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <!-- Nội dung cho row 2 trong phần dưới -->
                            <h5 class="card-title">Row 2</h5>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>

<!-- Biểu đồ kết hợp -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {'packages':['corechart', 'combochart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Danh mục', 'Số lượng sản phẩm', 'Giá trị sản phẩm'],
                <?php
                    $tongdm = count($thongkesk);
                    $i = 1;
                    foreach ($thongkesk as $key => $value) {
                        echo "['{$value['name_cat']}', {$value['total_quantity']}, {$value['total_value']}]";
                        if ($i < $tongdm) echo ",";
                        $i++;
                    }
                ?>
            ]);

            var options = {
                title: 'Số lượng và giá trị sản phẩm theo danh mục',
                vAxis: {title: 'Số lượng sản phẩm'},
                hAxis: {title: 'Danh mục'},
                seriesType: 'column',
                series: {
                    1: {type: 'line', color: '#FF6347'}
                },
                colors: ['#4CAF50', '#FF6347'],
                backgroundColor: '#f4f4f4',
                animation: {
                    startup: true,
                    duration: 1000,
                    easing: 'out',
                },
                bar: {groupWidth: '75%'},
                legend: {position: 'none'},
            };

            var chart = new google.visualization.ComboChart(document.getElementById('combo_chart'));
            chart.draw(data, options);
        }
    </script>

</div>
