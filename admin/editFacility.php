<?php
include "navbar.php";
if (isset($_GET['fc_id'])) {
    $fc_id = $_GET['fc_id'];
    $fc = $pdo->query("select * from facility where fc_id='$fc_id'")->fetch();
}
if (isset($_POST['sbmt'])) {
    if(isset($_FILES['img'])){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/facility/';
        $uploadfile = $uploaddir.$fc_id.".png";
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    $fc_name = $_POST['name'];
    $text = $_POST['text'];
    $pdo->exec("UPDATE `facility` SET `fc_name`='$fc_name',`fc_text`='$text' where fc_id='$fc_id'");
    header("Location:index.php");
}
?>
<div class="col-xs-6 col-xs-offset-3">
    <form role="form" method="post" action="editFacility.php?fc_id=<?= $fc_id; ?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="img"/><br/>
        <input class="form-control" type="text" name="name" value="<?=$fc['fc_name'] ?>"/><br/>
        <textarea class="form-control" type="text" name="text" id="" cols="30" rows="7"
                  placeholder="пишите о новость"> <?=$fc['fc_text']?>
        </textarea><br/>
        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Изменить">
    </form>


</div>