<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <?php require_once 'layout/header.php' ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Đăng nhập</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['error_message'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                            </div>
                        <?php endif; ?>

                        <form id="loginForm" action="index.php?act=login" method="post" novalidate>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="error" id="emailError"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="error" id="passwordError"></div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Đăng nhập</button>
                            <a href="?act=register" class="btn btn-link">Chưa có tài khoản? Đăng ký ngay</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            let valid = true;
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');


            emailError.textContent = '';
            passwordError.textContent = '';

            if (!email.validity.valid) {
                emailError.textContent = 'Vui lòng điền vào trường này';
                valid = false;
            }

            if (!password.validity.valid) {
                passwordError.textContent = 'Vui lòng điền vào trường này';
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
