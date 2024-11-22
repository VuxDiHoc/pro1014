<?php 
require_once 'layout/header.php'; 
require_once 'layout/navbar.php'; 

    if (is_array($stmt)) {
        extract($stmt);
    }    
?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
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

        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Cập Nhật Biến Thể</h1>

            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input">
                            Mã Biến Thể <br>
                            <input type="text" name="maloai" disabled id="maloai" value="<?= htmlspecialchars($id_variant) ?>">
                        </div>
                        <div class="input">
                            Tên Biến Thể <br>
                            <input type="text" id="tenloai" name="tenloai" value="<?= htmlspecialchars($name_color) ?>">
                            <br>
                            <p style="color: red;" id="loitl"></p>
                        </div>
                        <div style="margin-top: 20px;" class="input">
                            <input class="btn btn-primary" type="submit" name="update" value="Cập Nhật" onclick="return validate()">
                            <a href="index.php?act=listvariant"><input class="btn btn-success" type="button" value="DANH SÁCH"></a>
                        </div>
                    </form>
                    <?php if (isset($thongbao)) echo "<p>$thongbao</p>"; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validate() {
        var tenloai = document.getElementById("tenloai").value;
        if (tenloai == "") {
            document.getElementById("loitl").innerHTML = "Không được để trống ";
            return false;
        } else {
            document.getElementById("loitl").innerHTML = "";
        }
    }
</script>

<?php 
require_once 'layout/scripts.php'; 
require_once 'layout/footer.php';
?>
