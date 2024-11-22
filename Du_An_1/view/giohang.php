<?php require_once 'layout/header.php' ?>


    <!-- Start Content Page -->
    <div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="h2 text-success mb-4">Your Shopping Cart</h2>
            <table class="table table-bordered">
                <thead class="bg-light">
                    <tr>
                        <th>Hình Ảnh</th>
                        <th>Tên </th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                    <!-- Items will be dynamically loaded here -->
                     <tr>
                        <td>Anh</td>
                        <td>Dien Thoai</td>
                        <td>100000</td>
                        <td>3</td>
                        <td>300000</td>
                        <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                     </tr>

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h3 class="text-success mb-3">Cart Summary</h3>
            <p><strong>Tog:</strong> <span id="cart-total">$0.00</span></p>
            <a href="?act=shop" class="btn btn-outline-success">Thêm Đơn Hàng</a>
            <a href="?act=checkout" class="btn btn-success">Mua</a>
        </div>
    </div>
</div>

    <!-- End Contact -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
    const cartItems = [
        { id: 1, name: "Product A", price: 20, quantity: 2 },
        { id: 2, name: "Product B", price: 15, quantity: 1 },
        { id: 3, name: "Product B", price: 15, quantity: 1 },
        { id: 4, name: "Product B", price: 15, quantity: 1 },
        { id: 5, name: "Product B", price: 15, quantity: 1 },
        { id: 6, name: "Product B", price: 15, quantity: 1 }
    ];

    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    function renderCart() {
        cartItemsContainer.innerHTML = "";
        let total = 0;

        cartItems.forEach(item => {
            total += item.price * item.quantity;

            const row = `
                <tr>
                    <td><img src="assets/img/product-${item.id}.jpg" alt="${item.name}" width="50"></td>
                    <td>${item.name}</td>
                    <td>$${item.price.toFixed(2)}</td>
                    <td>
                        <input type="number" value="${item.quantity}" class="form-control" min="1" 
                               data-id="${item.id}" />
                    </td>
                    <td>$${(item.price * item.quantity).toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" data-id="${item.id}">Xóa</button>
                    </td>
                </tr>`;
            cartItemsContainer.insertAdjacentHTML("beforeend", row);
        });

        cartTotal.textContent = `$${total.toFixed(2)}`;
    }

    // Update Quantity
    cartItemsContainer.addEventListener("change", e => {
        if (e.target.type === "number") {
            const id = parseInt(e.target.getAttribute("data-id"));
            const quantity = parseInt(e.target.value);

            const item = cartItems.find(item => item.id === id);
            if (item) {
                item.quantity = quantity;
                renderCart();
            }
        }
    });

    // Remove Item
    cartItemsContainer.addEventListener("click", e => {
        if (e.target.classList.contains("btn-danger")) {
            const id = parseInt(e.target.getAttribute("data-id"));
            const index = cartItems.findIndex(item => item.id === id);

            if (index !== -1) {
                cartItems.splice(index, 1);
                renderCart();
            }
        }
    });

    // Initial Render
    renderCart();
});
</script> -->
<?php
require_once 'layout/scripts.php';
require_once 'layout/footer.php'
// function updateCart(itemId, quantity) {
//     $.post("update-cart.php", { id: itemId, quantity: quantity }, response => {
//         console.log(response);
//     });
// }
?>