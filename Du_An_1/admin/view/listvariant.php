<?php
require_once 'layout/header.php';
require_once 'layout/navbar.php';
?>

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">

        <?php require_once 'layout/topbar.php'?>

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            </div>

            <div class="row">
             
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">DANH SÁCH BIẾN THỂ</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th></th>
                    <th>MÃ LOẠI</th>
                    <th>TÊN LOẠI</th>
                    <th>THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                        foreach ($variants as $variant) {
                            extract($variant); 
                            $suabt = "index.php?act=updatevariant&id_variant=".$id_variant; 
                            $xoabt = "index.php?act=deletevariant&id_variant=".$id_variant;

                            echo '
                                <tr>
                                    <td><input type="checkbox" name= "chk" id=""></td>
                                    <td>'.$id_variant.'</td>  <!-- Hiển thị id -->
                                    <td>'.$name_color.'</td> <!-- Hiển thị tên -->
                                    <td><a href="'.$suabt.'"><input class="btn btn-primary" type="button" value="Sửa"></a> <a href="'.$xoabt.'"><input class="btn btn-danger" type="button" value="Xóa"></a></td>
                                </tr>
                            ';
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
            <div class="input_button">
                <input onclick="selects()" class="btn btn-info" type="button" value="Chọn tất cả">
                <input onclick="deSelect()" class="btn btn-info " type="button" value="Bỏ chọn tất cả">
                <input class="btn btn-danger" type="button" value="Xóa các mục đã chọn">
                <a href="index.php?act=addvariant"><input class="btn btn-success" type="button" value="Nhập thêm"></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function selects(){  
            var ele=document.getElementsByName('chk');  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=true;  
            }  
        }  
        function deSelect(){  
            var ele=document.getElementsByName('chk');  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=false;  
            }  
        }  
</script>
                 
            </div>
             
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    require_once 'layout/scripts.php';
    require_once 'layout/footer.php';
    ?>