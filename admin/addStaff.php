<?php
include "connect.php";
include "lock.php";
include "navbar.php";
$message = ''; $flag = false;
$result=$pdo->query("SELECT MAX(`st_id`) as maximum FROM `staff`")->fetchAll();
$id=($result[0][0])+1;

if($_POST && isset($_POST['name'])){
    $name = $_POST['name'];
    $name=mysql_escape_string($name);
    $proff = $_POST['proff'];
    $proff = mysql_escape_string($proff);

    $result = $pdo->prepare("insert into staff(st_name, st_proff, st_img) VALUES (?,?,?)")->execute(array(
            $name, $proff, $id));

    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/staff/';
    $uploadfile = $uploaddir.$id.".png";
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);

    $flag = $result;
    if($result==true){
        $message =  "Сотрудник добавлен";
    }
    else{
        $message = "Сотрудник не добавлен";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Добавить сотрудник</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-primary">Добавить сотрудника</h2>
        <?php if($message != ''):?>
            <div class="alert alert-<?php echo ($flag)? "success" : "danger";?>">
                <?php echo $message;?>
            </div>
        <?php endif;?>
        <div class="col-xs-6 col-xs-offset-3 well">
            <form role="form" method="post" enctype="multipart/form-data">
                <input class="form-control" type="text" name="name" placeholder="Имя сотрудника..."/><br/>
                <input class="form-control" type="text" name="proff" placeholder="Профессия..."/><br/>
                <input class="form-control" type="file" name="img"/>
                <br/>
                <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Добавит сотрудника">
            </form>
        </div>
    </div>
</body>
</html>