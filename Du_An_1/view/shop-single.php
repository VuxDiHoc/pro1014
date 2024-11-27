<?php require_once 'layout/header.php' ?>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="assets/img/<?= $productOne['img_product'] ?>"
                        alt="Card image cap" id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $productOne['name'] ?></h1>
                        <p class="h3 py-2"><?= number_format($productOne['price']) ?>đ</p>
                        <p class="py-2">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <span class="list-inline-item text-dark">Rating 4.8</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?= $productOne['firms'] ?></strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p><?= $productOne['description'] ?></p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Số lượng còn lại :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong><?= $productOne['amount'] ?></strong></p>
                            </li>
                        </ul>

                        <form action="index.php?act=addToCart" method="POST">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Màu :
                                            <input type="hidden" name="product-size" id="product-size" value="S">
                                        </li>
                                        <?php foreach ($product_variant as $key => $value) {
                                            ?>
                                            <li class="list-inline-item"><span
                                                    class="btn btn-success btn-size"><?= $value['name_color'] ?></span>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- <div class="quantity_selector">
									<span class="minus">
										<div class="buttongiam"><i class="fa fa-minus" aria-hidden="true"></i></div>
									</span>
									<input style="margin: 15px 0px;width: 30px" type="text" id="quantity" name="product-quanity" value=1><br>
									<span class="plus">
										<div class="buttontang"><i class="fa fa-plus" aria-hidden="true"></i></div>
										</i>
									</span>
								</div> -->
                                <div class="col-auto">
            <ul class="list-inline pb-3">
                <li class="list-inline-item text-right">
                    Số lượng
                            </li>
                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                            <li class="list-inline-item"><span  class="btn btn-success" id="btn-plus">+</span></li>
                        </ul>
                    </div>
                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit"
                                        value="buy">Buy</button>
                                </div>
                                <!-- <form action="index.php?act=addToCart" method="POST"> -->
                                    <input type="hidden" name="productId" value="<?= $productOne['id_product'] ?>">
                                    <input type="hidden" name="name" value="<?= $productOne['name'] ?>">
                                    <input type="hidden" name="price" value="<?= $productOne['price'] ?>">
                                    <input type="hidden" name="color" value="<?= $product_variant[0]['name_color'] ?? 'Default Color' ?>">
                                    <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                    <input type="hidden" name="img" value="<?= $productOne['img_product'] ?>">
                                    <div class="quantity_selector">
									<span class="minus">
										<div class="buttongiam"><i class="fa fa-minus" aria-hidden="true"></i></div>
									</span>
									<input style="margin: 15px 0px;width: 30px" type="text" id="quantity" name="product-quanity" value=1>
									<span class="plus">
										<div class="buttontang"><i class="fa fa-plus" aria-hidden="true"></i></div>
										</i>
									</span>
								</div>
                                    <div class="col d-grid">
                                        <button href="index.php?act=cart" type="submit" class="btn btn-success btn-lg" name="addtocart">Add To Cart</button>
                                    </div>
                                </form>
                                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->
<!-- Start Article -->
<section class="py-5">
    <div class="container">

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">
            <div class="p-2 pb-3">
                <div class="product-wap card rounded-0">
                    <div class="card-header">Bình luận</div>
                    <div class="card-body">
                        <?php
                        foreach ($comments as $com) {
                            ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-start">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="text-primary fw-bold mb-0">
                                                    <?= $com['full_name'] ?>
                                                </h6>
                                                <p class="mb-0"><?= $com['day_post'] ?></p>

                                            </div>
                                            <p> <?= $com['content'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                            <form id="commentForm">
                            <input type="hidden" name="id_pro" value="<?= $productOne['id_product'] ?>">
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <div class="d-flex flex-start">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <div class="col-sm-8">
                                                        <input type="text" name="detail" class="form-control"
                                                            placeholder="Nhập bình luận" required>
                                                    </div>
                                                    <input class="btn btn-primary btn_product text_content"
                                                        name="post_comment" type="submit" value="Gửi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <?php
                        } ?>
                    </div>                   
                </div>
            </div>



        </div>


    </div>
</section>
<!-- End Article -->

<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
    ?>
<script>
    $(document).ready(function () {
        $('#commentForm').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: 'index.php?act=addComment',
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    if (response === "Bạn cần đăng nhập để có thể bình luận") {
                        alert(response);
                    } else {
                        location.reload();
                    }
                }
            });
        });
        document.getElementById('btn-minus').addEventListener('click', () => {
    const quantityElem = document.getElementById('var-value');
    let quantity = parseInt(quantityElem.innerText);
    if (quantity > 1) {
        quantityElem.innerText = --quantity;
        document.getElementById('product-quanity').value = quantity;
    }
});
document.getElementById('btn-plus').addEventListener('click', () => {
    const quantityElem = document.getElementById('var-value');
    let quantity = parseInt(quantityElem.innerText);
    quantityElem.innerText = +quantity;
    document.getElementById('product-quanity').value = quantity;
});
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('added') === 'true') {
        alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
    }
});
let tang = document.querySelector(".buttontang");
		let giam = document.querySelector(".buttongiam");
		let quantity = document.querySelector("#quantity");
		tang.onclick = () => {
			quantity.value++;
		}
		giam.onclick = () => {
			quantity.value--;
			if (quantity.value <= 0) {
				quantity.value = 1;
			}
		}
    });


</script>