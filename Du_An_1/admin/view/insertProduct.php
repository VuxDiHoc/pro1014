<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>

<div id="content-wrapper" class="d-flex flex-column">

    
    <div id="content">

        
        <?php require_once 'layout/topbar.php' ?>

       
        <div class="container-fluid">

            
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
            </div>

            
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

                    <div class="variant-section mb-4 p-4 border rounded">
                        <h5 class="mb-3 text-primary">Biến thể sản phẩm</h5>

                        
                        <div class="mb-3">
                            <label for="variant_color" class="form-label">Màu sắc</label>
                            <select class="form-select" id="variant_color" name="variant_color[]">
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
                            <label for="variant_quantity" class="form-label">Số lượng</label>
                            <input class="form-control" type="number" id="variant_quantity" name="variant_quantity[]"
                                placeholder="Số lượng" required />
                        </div>
                        
                    </div>
                    
                    <div id="variantContainer"></div>
                    
                    <div class="mb-3">
                            <button class="btn btn-info" type="button" id="addVariant">Thêm biến thể</button>
                        </div>
                    <button class="btn btn-primary" type="submit" name="btn_insert">Thêm sản phẩm</button>
                </form>

            </div>


        </div>
        

    </div>
    
    <script>
        document.getElementById('addVariant').addEventListener('click', function () {
            var variantContainer = document.getElementById('variantContainer');
            var newVariant = document.createElement('div');
            newVariant.classList.add('variant-section', 'border', 'p-4', 'rounded', 'mb-4');

            newVariant.innerHTML = `
            <h5 class="mb-3 text-primary">Biến thể sản phẩm</h5>
            <div class="mb-3">
                <label for="variant_color" class="form-label">Màu sắc</label>
                <select class="form-select" name="variant_color[]">
                    <?php
                    foreach ($variant as $key => $value) {
                        echo '<option value="' . $value['id_variant'] . '">' . $value['name_color'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="variant_quantity" class="form-label">Số lượng</label>
                <input class="form-control" type="number" name="variant_quantity[]" placeholder="Số lượng" required />
            </div>
        `;

            variantContainer.appendChild(newVariant);
        });
    </script>
    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>