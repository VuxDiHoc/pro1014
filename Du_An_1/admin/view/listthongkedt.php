<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>




<div id="content-wrapper" class="d-flex flex-column">

    
    <div id="content">

        
        <?php require_once 'layout/topbar.php'?>

        
        <div class="container-fluid">

            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>

            
            <div class="row">
                
                 

                <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thống kê doanh thu</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Tên</th>
                            <th>Tổng doanh thu</th>
                            <th>Doanh thu theo ngày</th>
                            <th>Doanh thu theo tuần</th>
                            <th>Doanh thu theo tháng</th>
                            <th>Doanh thu theo năm</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    foreach ($thongkesk as $key => $value) {
        
        $daily_revenue = $value['total_revenue'] / 365; 
        $weekly_revenue = $daily_revenue * 7; 
        $monthly_revenue = $daily_revenue * 30; 
        $yearly_revenue = $value['total_revenue']; 

        ?>
        <tr>
            <td><input type="checkbox" name="select[]" value="<?= $value['id_category'] ?>"></td>
            <td><?= $value['name_cat'] ?></td>
            <td><?= number_format($value['total_revenue'], 0, ',', '.') ?> VND</td>
            <td><?= number_format($daily_revenue, 0, ',', '.') ?> VND</td>
            <td><?= number_format($weekly_revenue, 0, ',', '.') ?> VND</td>
            <td><?= number_format($monthly_revenue, 0, ',', '.') ?> VND</td>
            <td><?= number_format($yearly_revenue, 0, ',', '.') ?> VND</td>
        </tr>
        <?php
    }
    ?>
</tbody>
                </table>
                <div class="input_button">
                    <a href="index.php?act=bieudodt"><input class="btn btn-success" type="button" value="Biểu đồ"></a>
                </div>
            </div>
        </div>
    </div>
</div>

             
        

    </div>
    

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>