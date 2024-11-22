<?php
require_once 'view/layout/header.php';
require_once 'view/layout/navbar.php';
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">DANH SÁCH DANH MỤC</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                            foreach ($listcategories as $categories){                extract($categories);
                                $suadm = "index.php?act=suadm&id=".$id;
                                $xoadm = "index.php?act=xoadm&id=".$id;

                                echo '
                                    <tr>
                                        <td><input type="checkbox" name= "chk" id=""></td>
                                        <td>'.$id.'</td>
                                        <td>'.$name.'</td>
                                            <td><a href= "'.$suadm.'"><input class="btn-primary" type="button" value="Sửa"></a> <a href= "'.$xoadm.'"><input class="btn-danger" type="button" value="Xóa"></a> </td>
                                    </tr>
                                            ';
                            }
                                ?>
                        </tr>
                    </tbody>
                </table>
                <div class="input_button">
                    <!-- <input onclick="selects()" class="btn-info" type="button" value="Chọn tất cả">
                    <input onclick="deSelect()" class="btn-info " type="button" value="Bỏ chọn tất cả">
                    <input class="btn-danger" type="button" value="Xóa các mục đã chọn"> -->
                    <a href="index.php?act=adddm"><input class="btn-success" type="button" value="Nhập thêm"></a>
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
 <?php
    require_once 'view/layout/scripts.php';
    require_once 'view/layout/footer.php';
    ?>