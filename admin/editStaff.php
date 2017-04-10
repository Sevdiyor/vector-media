<?php
include "navbar.php";
if (isset($_GET['st_id'])) {
    $st_id = $_GET['st_id'];
    $st = $pdo->query("select * from staff where st_id='$st_id'")->fetch();
}
if (isset($_POST['sbmt'])) {
    if(isset($_FILES['img'])){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/staff/';
        $uploadfile = $uploaddir.$st_id.".png";
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    $name = $_POST['name'];
    $proff = $_POST['proff'];
    $pdo->exec("UPDATE `staff` SET `st_name`='$name',`st_proff`='$proff' where st_id='$st_id'");
    header("Location: index.php");
}
?>
<div class="col-xs-6 col-xs-offset-3">
    <form role="form" method="post" action="editStaff.php?st_id=<?= $st_id; ?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="img"/><br/>
        <input class="form-control" type="text" name="name" value="<?= $st["st_name"] ?>"/><br/>
        <input class="form-control" type="text" name="proff" value="<?= $st["st_proff"] ?>"/><br/>
        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Изменить">
    </form>


</div>