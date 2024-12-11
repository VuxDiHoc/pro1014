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
                <h1 class="h3 mb-0 text-gray-800">Sửa sản phẩm</h1>
            </div>

            <!-- Content Row -->
            <div class="row-cols-auto">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" class="visually-hidden" name="amount" value="<?= $oneProduct['amount'] ?>" />
                    <div class="mb-3">
                        <label for="" class="form-label">Tên</label>
                        <input type="text" class="form-control" name="name" value="<?= $oneProduct['name'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Hãng</label>
                        <input type="text" class="form-control" name="firms" value="<?= $oneProduct['firms'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="price" value="<?= $oneProduct['price'] ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Giảm giá</label>
                        <input type="number" class="form-control" name="discount"
                            value="<?= $oneProduct['discount'] ?>" />
                    </div>
                    <div class="mb-3">
                        <img src="../assets/img/<?= $oneProduct['img_product'] ?>" alt="" width="200px"
                            height="130px">
                        <label for="" class="form-label">Chọn ảnh</label>
                        <input type="file" class="" name="img" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="description" rows="2"><?= $oneProduct['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Loại hàng</label>
                        <select class="form-select form-select-lg" name="category">
                            <?php
                            foreach ($category as $key => $value) {
                                ?>
                                <option value="<?= $value['id_category'] ?>" <?php if ($value['id_category'] === $oneProduct['id_category'])
                                      echo 'selected'; ?>>
                                    <?= $value['name_cat'] ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit" name="btn_update">Sửa sản phẩm</button>
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