<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'adddm':
                //kiêm tra xem ng dùng có click vào nút add hay không
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai= $_POST['tenloai'];
                    insert_categories($tenloai);
                    $thongbao= "Thêm thành công";
                }
                include "view/danhmuc/add.php";
                break;

            case 'lisdm':
                $listcategories =loadall_categories();
                include "view/danhmuc/list.php";
                break;
            
            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_categories($_GET['id']);
                }
                $listcategories =loadall_categories();
                include "view/danhmuc/list.php";
                break;

            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    // $sql = "SELECT * FROM danhmuc where id =".$_GET['id'];
                    // $dm = pdo_query_one($sql);
                    $dm = loadone_categories($_GET['id']);
                    
                }
                include "view/danhmuc/update.php";
                break;

            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai= $_POST['tenloai'];
                    $id= $_POST['id'];
                    update_categories($id,$tenloai);
                    $thongbao= "Cập nhật thành công";
                }
                $listcategories =loadall_categories();
                include "view/danhmuc/list.php";
                break;
            }}

?>