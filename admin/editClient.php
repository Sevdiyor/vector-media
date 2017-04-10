<?php
include "navbar.php";
if (isset($_GET['cl_id'])) {
    $cl_id = $_GET['cl_id'];
    $client = $pdo->query("select * from clients where cl_id='$cl_id'")->fetch();
}
if (isset($_POST['sbmt'])) {
    if(isset($_FILES['img'])){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/clLogos/';
        $uploadfile = $uploaddir.$cl_id.".png";
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    $cl_name = $_POST['cl_name'];
    $site = $_POST['site'];
    $pdo->exec("UPDATE `clients` SET `cl_name`='$cl_name',`site`='$site' where cl_id='$cl_id'");
    header("Location: index.php");
}
?>
<div class="col-xs-6 col-xs-offset-3">
    <form role="form" method="post" action="editClient.php?cl_id=<?= $cl_id; ?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="img"/><br/>
        <input class="form-control" type="text" name="cl_name" value="<?= $client["cl_name"] ?>"/><br/>
        <input class="form-control" type="text" name="site" value="<?= $client["site"] ?>"/><br/>
        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Изменить">
    </form>


</div>