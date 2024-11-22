<?php
require_once 'view/layout/header.php';
require_once 'view/layout/navbar.php';
?>
<?php
    if(is_array($dm)){
        extract($dm);
    }

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CẬP NHẬT DANH MỤC</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div  class="table-responsive1">
            <form  action="index.php?act=updatedm" method="POST">
            <div style="display: block;" class="row mb10">
                Mã loại <br>
                <input type="text" name="maloai" disabled>
            </div>
            <div style="display: block;" class="row mb10">
                Tên loại <br>
                <input type="text" name="tenloai" value="<?php if(isset($name) &&($name!= "")) echo $name; ?>">
            </div>
            <div  class="row mb10">
                <input   type="hidden" name="id" value="<?php if(isset($id) &&($id>0 )) echo $id; ?>">
                <input style="margin: 12px 10px 0 10px;" class="btn-primary" type="submit" name="capnhat" value="CẬP NHẬT">
                <a href="index.php?act=lisdm"><input style="margin: 12px 0 0 0;" class="btn-success" type="button" value="Danh sách"></a>
            </div>
            <?php
                if(isset($thongbao)&&($thongbao != "")) echo $thongbao;

            ?>
        </form>
            </div>
        </div>
    </div>
    <?php
    require_once 'view/layout/scripts.php';
    require_once 'view/layout/footer.php';
    ?>

  
