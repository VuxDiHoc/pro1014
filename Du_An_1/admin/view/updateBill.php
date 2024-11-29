<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php require_once 'layout/topbar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Chi tiết đơn hàng</h1>
            </div>

            <!-- Content Row -->
            <div class="row-cols-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <?php foreach ($oneBill as $item): ?>
                        <div class="mb-3">
                            <label for="" class="form-label">Tên của sản phẩm</label>
                            <input type="text" class="form-control" name="name_product" value="<?= $item['name_product'] ?>"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Giá của sản phẩm</label>
                            <input type="text" class="form-control" name="price" value="<?= number_format($item['price']) ?>đ" readonly />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Số lượng sản phẩm</label>
                            <input type="number" class="form-control" name="quantity" value="<?= $item['quantity'] ?>"
                                readonly />
                        </div>
                        <hr> <!-- Ngăn cách giữa các sản phẩm -->
                    <?php endforeach; ?>

                    <div class="mb-3">
                        <label for="" class="form-label">Trạng thái</label>
                        <select class="form-select form-select-lg" name="status">
                            <?php
                            foreach ($statusDescriptions as $key => $value) {
                                ?>
                                <option value="<?= $key ?>" <?php if ($key == $status['status']) {
                                      echo 'selected';
                                  } ?>>
                                    <?= $value ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit" name="btn_update">Sửa trạng thái</button>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>