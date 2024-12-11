<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>




<div id="content-wrapper" class="d-flex flex-column">

    
    <div id="content">

        
        <?php require_once 'layout/topbar.php'?>

        
        <div class="container-fluid">

            

            
            <div class="row">
            <div class="container-fluid">


<h1 class="h3 mb-2 text-gray-800">THÊM BIẾN THỂ</h1>


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

        
        if (tenloai == "") {
            document.getElementById("loitl").innerHTML = "Không được để trống tên biến thể";
            isValid = false;
        } else {
            document.getElementById("loitl").innerHTML = "";
        }

        

        return isValid;
    }
</script>


</div>

                 
            </div>
        

    </div>
    

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>