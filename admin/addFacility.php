<?php
include "connect.php";
include "lock.php";
include "navbar.php";
$message = ''; $flag = false;
$result=$pdo->query("SELECT MAX(`fc_id`) as maximum FROM `facility`")->fetchAll();
$id=($result[0][0])+1;

if($_POST && isset($_POST['title'])){
    $title = $_POST['title'];
    $title=mysql_escape_string($title);
    $text = $_POST['text'];
    $text = mysql_escape_string($text);

    $result = $pdo->prepare("insert into facility(fc_name, fc_text, fc_img) VALUES (?,?,?)")->execute(array(
            $title, $text, $id));

    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/facility/';
    $uploadfile = $uploaddir.$id.".png";
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);


    $flag = $result;
    if($result==true){
        $message =  "Услуга добавлена";
    }
    else{
        $message = "Услуга не добавлена";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>добавить услугу</title>

   </head>
<body>
    <div class="container">
        <h2 class="text-center text-primary">Добавить услугу</h2>
        <?php if($message != ''):?>
            <div class="alert alert-<?php echo ($flag)? "success" : "danger";?>">
                <?php echo $message;?>
            </div>
        <?php endif;?>
        <div class="col-xs-6 col-xs-offset-3 well">
            <form role="form" method="post" enctype="multipart/form-data">
                <input class="form-control" type="text" name="title" placeholder="title..."/><br/>
                <textarea class="form-control" name="text" placeholder="О услуге..."></textarea><br/>
                <input class="form-control" type="file" name="img"/>
                <br/>
                <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Добавит услугу">
            </form>
            <br/>
            <a href="#" class="btn btn-default btn-block">Все услуги</a>
        </div>
    </div>
</body>
</html>