<?php
include "connect.php";
include "lock.php";
include "navbar.php";
$message = ''; $flag = false;
$result=$pdo->query("SELECT MAX(`cl_id`) as maximum FROM `clients`")->fetchAll();
$id=($result[0][0])+1;

if($_POST && isset($_POST['name'])){
    $name = $_POST['name'];
    $name=mysql_escape_string($name);
    $site = $_POST['site'];

    $result = $pdo->prepare("insert into clients(cl_name, site, logo) VALUES (?,?,?)")->execute(array(
            $name, $site, $id));

    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/clLogos/';
    $uploadfile = $uploaddir.$id.".png";
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);


    $flag = $result;
    if($result==true){
        $message =  "клиент добавлен";
    }
    else{
        $message = "клиент не добавлен";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>добавить клиент</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-primary">Добавить клиент</h2>
        <?php if($message != ''):?>
            <div class="alert alert-<?php echo ($flag)? "success" : "danger";?>">
                <?php echo $message;?>
            </div>
        <?php endif;?>
        <div class="col-xs-6 col-xs-offset-3 well">
            <form role="form" method="post" enctype="multipart/form-data">
                <input class="form-control" type="text" name="name" placeholder="Название фирмы, или компании..." required="required"/><br/>
                <input class="form-control" type="text" name="site" placeholder="сайт фирмы..."/><br/>
                <input class="form-control" type="file" name="img"/>
                <br/>
                <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Добавит клиент">
            </form>
        </div>
    </div>
</body>
</html>