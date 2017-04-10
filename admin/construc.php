<?php
include "connect.php";
include "lock.php";
$formats=$pdo->query("select * from format")->fetchAll();
$construc = $pdo -> query("select * from construc c
        join type t on t.type_id=c.type_id
        join format f on f.format_id=c.format_id") ->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $pdo -> exec("delete  from construc where construc_id = $id");
    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/constructions/';
    $uploadfile = $uploaddir.$id.".png";
    unlink($uploadfile);
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Все конструкци</title>
</head>
<body>
<br/>
<div class="container">
    <div class="row">
        <?php
            foreach ($construc as $c){
        ?>
        <div class="col-xs-6 col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="img-responsive" src="../images/constructions/<?php echo($c['img'])?>.png" alt="">

                    <div class="overlay">
                        <div>
                            <h3><a><?php echo($c['type_name'])?>, <?php echo($c['format_name'])?></a></h3>
                            <p><?php echo($c['adress'])?></p>
                            <a href="editCons.php?cons_id=<?=$c["construc_id"]?>"><button class="btn btn-warning" title="edit this phone new"><span class="glyphicon glyphicon-edit"></span></button></a>
                            <a href="construc.php?id=<?=$c['construc_id']?>"><button class="btn btn-danger" title="delete this new"><span class="glyphicon glyphicon-minus-sign"></span></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
</body>

</html>

