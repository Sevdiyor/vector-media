<?php
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 23.12.16
 * Time: 12:04
 */
include "navbar.php";
if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    $car = $pdo->query("select * from carousel where car_id='$car_id'")->fetch();
}
if (isset($_POST['sbmt'])) {
    if(isset($_FILES['img'])){
    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/carousel/';
    $uploadfile = $uploaddir.$car_id.".jpg";
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    $pdo->exec("UPDATE `carousel` SET `car_title`='$title',`car_desc`='$desc' where car_id='$car_id'");
    header("Location:index.php");
}
?>
<div class="col-xs-6 col-xs-offset-3">
    <h2 class="text-center text-danger">Выбранное фото должен быть 1366 х 540 px</h2>
    <form role="form" method="post" action="editcarousel.php?car_id=<?= $car_id; ?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="img"/><br/>
        <input class="form-control" type="text" name="title" value="<?= $car["car_title"] ?>"/><br/>
        <input class="form-control" type="text" name="desc" value="<?= $car["car_desc"] ?>"/><br/>
        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Изменить">
    </form>


</div>


