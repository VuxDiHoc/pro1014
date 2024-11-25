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
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- code ở đây -->
                 

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">THỐNG KÊ SỐ LƯỢNG SẢN PHẨM</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN</th>
                    <th>SỐ LƯỢNG SẢN PHẨM CÒN TRONG KHO</th>
                    <th>SỐ LƯỢNG ĐÃ BÁN</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    
                    </tr>
                </tbody>
            </table>
            <div class="input_button">
                <input onclick="selects()" class="btn btn-info" type="button" value="Chọn tất cả">
                <input onclick="deSelect()" class="btn btn-info " type="button" value="Bỏ chọn tất cả">
                <input class="btn btn-danger" type="button" value="Xóa các mục đã chọn">
                <a href="index.php?act=addvariant"><input class="btn btn-success" type="button" value="Nhập thêm"></a>
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