<?php
include "connect.php";
include "lock.php";
include "navbar.php";
$message = ''; $flag = false;
$types=$pdo->query("select * from type")->fetchAll();
$formats=$pdo->query("select * from format")->fetchAll();
$result=$pdo->query("SELECT MAX(`construc_id`) as maximum FROM `construc`")->fetchAll();
$id=($result[0][0])+1;

if($_POST && isset($_POST['adress'])){
    $adress = $_POST['adress'];
    $adress=mysql_escape_string($adress);
    $type_id = $_POST['type_id'];
    $format_id=$_POST['format_id'];
    $cost = $_POST['cost'];

    $result = $pdo->prepare("insert into construc(type_id, format_id, adress, img, cost) VALUES (?,?,?,?, ?)")->execute(array(
            $type_id, $format_id, $adress, $id, $cost));

    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/constructions/';
    $uploadfile = $uploaddir.$id.".png";
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

    $flag = $result;
    if($result==true){
        $message =  "Конструкция добавлена";
    }
    else{
        $message = "Конструкция не добавлена";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>добавить конструкцию</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-primary">Добавить конструкцию</h2>
        <?php if($message != ''):?>
            <div class="alert alert-<?php echo ($flag)? "success" : "danger";?>">
                <?php echo $message;?>
            </div>
        <?php endif;?>
        <div class="col-xs-6 col-xs-offset-3 well">
            <form role="form" method="post" enctype="multipart/form-data">
                <select class="form-control" name="type_id">
                    <option disabled selected>Выберите конструкцию</option>
                    <?php
                    foreach ($types as $type) { ?>
                        <option value="<?php echo $type["type_id"]?>"><?php echo $type["type_name"]?></option>
                    <?php } ?>
                </select><br/>
                <select class="form-control" name="format_id">
                    <option disabled selected>Выберите формат</option>
                    <?php
                    foreach ($formats as $format) { ?>
                        <option value="<?php echo $format["format_id"]?>"><?php echo $format["format_name"]?></option>
                    <?php } ?>
                </select><br/>
                <textarea class="form-control" name="adress" placeholder="Ориентир..." required="required"></textarea><br/>
                <input class="form-control" type="text" name="cost" placeholder="цена за месяц..."/><br/>
                <input class="form-control" type="file" name="img" required="required"/>
                <br/>
                <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Добавит конструкцию">
            </form>
            <br/>
        </div>
    </div>
</body>
</html>