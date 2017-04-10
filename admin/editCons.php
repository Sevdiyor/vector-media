<?php
include "navbar.php";
$types=$pdo->query("select * from type")->fetchAll();
$formats=$pdo->query("select * from format")->fetchAll();

$message = ''; $flag = false;
if (isset($_GET['cons_id'])) {
    $cons_id = $_GET['cons_id'];
    $con = $pdo->query("select * from construc con
join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where construc_id='$cons_id'")->fetch();
}
if (isset($_POST['sbmt'])) {
    if(isset($_FILES['img'])){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/constructions/';
        $uploadfile = $uploaddir.$cons_id.".png";
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    $type = $_POST['type'];
    $format = $_POST['format'];
    $adress = $_POST['adress'];
    $cost = $_POST['cost'];
    $pdo->exec("update construc SET type_id='$type', format_id='$format', adress='$adress', cost='$cost' WHERE construc_id=".$_GET["cons_id"]);
    header("Location: index.php");

}

?>
<div class="col-xs-6 col-xs-offset-3">
    <form role="form" method="post" action="editCons.php?cons_id=<?= $cons_id; ?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="img"/><br/>
        <select class="form-control" name="type" id="type">
            <?php
            foreach($types as $t) {
                ?>
                <option value="<?php echo $t['type_id']; ?>" <?php if($t['type_id']==$con['type_id']){echo "selected";} ?>> <?php echo($t['type_name']) ?> </option>
            <?php
            }
            ?>
        </select><br>
        <select class="form-control" name="format" id="format">
            <?php
            foreach($formats as $f) {
                ?>
                <option value="<?php echo $f['format_id']; ?>" <?php if($f['format_id']==$con['format_id']){echo "selected";} ?>> <?php echo($f['format_name']) ?> </option>
            <?php
            }
            ?>
        </select><br>

        <textarea class="form-control" type="text" name="adress" id="" cols="30" rows="7"
                  placeholder="adress"> <?=$con['adress']?> </textarea><br/>
        <input class="form-control" type="text" name="cost" value="<?= $con["cost"] ?>"/><br/>
        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Изменить">
    </form>


</div>