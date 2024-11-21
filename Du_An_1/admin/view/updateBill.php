<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Chi tiết đơn hàng</h1>
            </div>

            <!-- Content Row -->
            <div class="row-cols-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên của sản phẩm</label>
                        <input type="text" class="form-control" name="name_product"
                            value="<?= $oneBill['name_product'] ?>" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá của sản phẩm</label>
                        <input type="number" class="form-control" name="price" value="<?= $oneBill['price'] ?>" readonly/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số lượng sản phẩm</label>
                        <input type="number" class="form-control" name="quantity" value="<?= $oneBill['quantity'] ?>" readonly/>
                    </div>
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