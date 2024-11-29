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