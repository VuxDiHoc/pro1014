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
                <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
            </div>

            <!-- Content Row -->
            <div class="row-cols-auto">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" required />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hãng</label>
                        <input type="text" class="form-control" name="firms" required />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="price" required />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giảm giá</label>
                        <input type="number" class="form-control" name="discount" value="0" required />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Chọn ảnh</label>
                        <input type="file" class="" name="img" placeholder="" aria-describedby="fileHelpId" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Loại hàng</label>
                        <select class="form-select form-select-lg" name="category">
                            <?php
                            foreach ($category as $key => $value) {
                                ?>
                                <option value="<?= $value['id_category'] ?>"><?= $value['name_cat'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="variant">
                        <div class="mb-3">
                            <label for="" class="form-label">Màu sắc</label>
                            <select class="form-select form-select-lg" name="variant_color[]">
                                <?php
                                foreach ($variant as $key => $value) {
                                    ?>
                                    <option value="<?= $value['id_variant'] ?>"><?= $value['name_color'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Số lượng</label>
                            <input class="form-control" type="number" name="variant_quantity[]" placeholder="Số lượng"
                                required />
                        </div>
                    </div>
                    <button class="btn btn-info" type="button" id="addVariant">Thêm biến thể</button>
                    <button class="btn btn-primary" type="submit" name="btn_insert">Thêm sản phẩm</button>
                </form>

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <script>
        // Thêm sự kiện để người dùng có thể thêm nhiều biến thể
        document.getElementById('addVariant').addEventListener('click', function () {
            var variantContainer = document.querySelector('.variant');
            var newVariant = variantContainer.cloneNode(true); // Sao chép phần tử .variant
            var inputs = newVariant.querySelectorAll('input');
            inputs.forEach(function (input) {
                input.value = ''; // Đặt lại giá trị mặc định
            });

            variantContainer.parentNode.insertBefore(newVariant, variantContainer.nextSibling);

        });
    </script>
    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>