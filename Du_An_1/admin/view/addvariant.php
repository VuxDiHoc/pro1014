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
            <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div> -->

            <!-- Content Row -->
            <div class="row">
            <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">THÊM BIẾN THỂ</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
        <form action="" method="POST">
        <div class="input">
            Mã Biến Thể <br>
            <input type="text" name="maloai" disabled id="maloai">
        </div>
        <div class="input">
            Tên Biến Thể <br>
            <input type="text" name="tenloai" id="tenloai">
                <p style="color: red ;" id="loitl"></p>
        </div>
        <div style="margin-top: 20px;" class="input">
            <input class="btn btn-primary" type="submit" name="themmoi" value="THÊM MỚI" onclick="return validate()">
            <a href="index.php?act=listvariant"><input class="btn btn-success" type="button" value="DANH SÁCH"></a>
        </div>
        <?php
            if(isset($thongbao)&&($thongbao != "")) echo $thongbao;

        ?>
    </form>

        </div>
    </div>
    <script>
    function validate() {
        var tenloai = document.getElementById("tenloai").value;

        var isValid = true;

        // Kiểm tra tên loại
        if (tenloai == "") {
            document.getElementById("loitl").innerHTML = "Không được để trống tên biến thể";
            isValid = false;
        } else {
            document.getElementById("loitl").innerHTML = "";
        }

        // Kiểm tra số lượng

        return isValid;
    }
</script>


</div>

                 
            </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>