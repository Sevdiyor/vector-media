<?php
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 21.11.16
 * Time: 13:44
 */
include "header.php";
if($_GET && isset($_GET['id'])){
$id = (int)$_GET["id"];
$new = $pdo->query("SELECT * FROM news where $id=news_id")->fetchAll();
}
else{
    $new = $pdo -> query("select * from news")->fetchAll();
}
if (!$new) header("Location: /");
?>
<!DOCTYPE html>
<html>
<head>
    <title>новости</title>
</head>
<body>
<br/>
<div class="container">
    <?php foreach($new as $n){?>
        <div class="panel panel-primary">
            <div class="panel-heading"><h3><?php echo $n["title"] ?></h3></div>
            <div class="panel-body">
                <div class="col-md-2 col-sm-4 col-xs-4"><img class="img-responsive" src="images/news/<?php echo $n["image"] ?>.png"/></div>
                <b><p class="text-justify"><?php echo $n["text"] ?></p></b>
            </div>
        </div>
    <?php } ?>
    <a href="/"><button class="btn btn-default pull-right"><i class="fa fa-chain"></i> на главную</button></a><br/><br/><br/>
</div>
</body>
<?php include"footer.php"?>
</html>