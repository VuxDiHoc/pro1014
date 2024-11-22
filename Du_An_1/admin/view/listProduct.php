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
                <h1 class="h3 mb-0 text-gray-800">Danh sách sản phẩm</h1>
            </div>

            <!-- Content Row -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bảng sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Hãng</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Số lượng</th>
                                    <th>Mô tả</th>
                                    <th>Danh mục</th>
                                    <th>Lượt xem</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><img src="../assets/img/<?= $value['img_product'] ?>"
                                                class="img-fluid rounded-top" alt="" width="180px" height="80px"
                                                class="rounded" />
                                        </td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['firms'] ?></td>
                                        <td><?= $value['price'] ?></td>
                                        <td><?= $value['discount'] ?></td>
                                        <td><?= $value['amount'] ?></td>
                                        <td style="max-width: 220px"><?= $value['description'] ?></td>
                                        <td><?= $value['name_cat'] ?></td>
                                        <td><?= $value['view'] ?></td>
                                        <td><?= ($value['censorship'] == 0) ? 'Đang hiện' : 'Đã ẩn' ?></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="?act=updateProduct&id=<?= $value['id_product'] ?>"
                                                role="button">Sửa</a>
                                            <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa ko?')"
                                                href="?act=deleteProduct&id=<?= $value['id_product'] ?>"
                                                role="button">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
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