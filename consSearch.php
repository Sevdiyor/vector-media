<?php
include "header.php";
$types=$pdo->query("select * from type")->fetchAll();
$formats=$pdo->query("select * from format")->fetchAll();
$ok=false;
$start=0;
$end=10;
$construc=0;
$constc=0;
$alert=false;
session_start();

if(isset($_GET['p']) && (isset($_SESSION['type']) && isset($_SESSION['format']) && isset($_SESSION['constcnt']))){
    if(isset($_GET['p'])){
        $start=($_GET['p']-1)*10;
        $end=10;
}

    $type_id=$_SESSION['type'];
    $format_id=$_SESSION['format'];
    $constc=$_SESSION['constcnt'];

    if($type_id!=0 && $format_id==0){
        $construc = $pdo ->query("SELECT * FROM construc con
join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id limit $start,$end")->fetchAll();

    }
    else if($type_id==0 && $format_id!=0){
        $construc = $pdo ->query("SELECT * FROM construc con
join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$format_id limit $start,$end")->fetchAll();

    }
    else{
        $construc = $pdo ->query("SELECT * FROM construc con
join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id and con.format_id=$format_id  limit $start,$end")->fetchAll();
    }

    $ok=true;
}
if(isset($_POST['sbmt'])){
    $ok=true;
    if(!isset($_POST['type']) && !isset($_POST['format'])){
//        $_SESSION['type']=0;
        $_SESSION['format']=0;
        $_SESSION['constcnt']=0;
            $_SESSION['type']=0;
        $alert=true;
    }
    else{
        $alert=false;
    if(isset($_POST['type']) && !isset($_POST['format'])){
        $type_id=$_POST['type'];
        $construc = $pdo ->query("SELECT * FROM construc con
join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id limit $start,$end")->fetchAll();

        $constcnt = $pdo ->query("SELECT count(*) as son FROM construc con
join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id limit $start,$end")->fetch();
        $_SESSION['type']=$_POST['type'];
        $_SESSION['format']=0;
    }
    else if(!isset($_POST['type']) && isset($_POST['format'])){
        $format_id=$_POST['format'];
        $construc = $pdo ->query("SELECT * FROM construc con

join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$format_id limit $start,$end")->fetchAll();
        $constcnt = $pdo ->query("SELECT count(*) as son FROM construc con

join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id limit $start,$end")->fetch();
        $_SESSION['format']=$_POST['format'];
        $_SESSION['type']=0;
    }
    else{
        $type_id=$_POST['type'];
        $format_id=$_POST['format'];
        $construc = $pdo ->query("SELECT * FROM construc con

join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id and con.format_id=$format_id  limit $start,$end")->fetchAll();
        $constcnt = $pdo ->query("SELECT count(*) as son FROM construc con

join type t on con.type_id=t.type_id join format f on con.format_id=f.format_id where con.type_id=$type_id limit $start,$end")->fetch();
        $_SESSION['type']=$_POST['type'];
        $_SESSION['format']=$_POST['format'];
    }
    $_SESSION['constcnt']=$constcnt['son'];
    }
   }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Подбор конструкцый</title>
</head>
<body>
<br/>
<div class="container">
    <h1 class="text-center">Система подбора конструкций наружной рекламы</h1><br/>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <form class="form-inline" method="post" action="consSearch.php?p=1" role="search">
                <div class="form-group">
                    <select class="form-control" name="type">
                        <option value="0" disabled selected>Выберите конструкцию</option>
                        <?php
                        foreach ($types as $type) { ?>
                            <option value="<?php echo $type["type_id"]?>"><?php echo $type["type_name"]?></option>
                        <?php } ?>
                    </select>
                    <select class="form-control" name="format">
                        <option value="0" disabled selected>Выберите формат</option>
                        <?php
                        foreach ($formats as $format) { ?>
                            <option value="<?php echo $format["format_id"]?>"><?php echo $format["format_name"]?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" class="btn btn-primary" name="sbmt" value="поиск">
                </div>
            </form>
        </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ФОТО</th>
                    <th>Тип конструкции</th>
                    <th>Формат</th>
                    <th>Дислокация</th>
                    <th>Цена (USD/месяц)</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!$alert){
                if($ok)
                    foreach($construc as $c){?>
                        <tr>
                            <td><?php echo $c["construc_id"]?></td>
                            <td>
                                <a href="cons.php?id=<?=$c["construc_id"]?>" class="btn">
                                    <img src="images/constructions/<?php echo $c["img"]?>.png" alt="<?php echo $c["type_id"]?>" width="120">
                                </a>
                            </td>
                            <td><?php echo $c["type_name"]?></td>
                            <td><?php echo $c["format_name"]?></td>
                            <td><?php echo $c["adress"]?></td>
                            <td><?php echo $c["cost"]?></td>
                        </tr>
                    <?php }
                }
                else{
                    echo "<tr><td colspan='6'><h2 class='text-center'>Конструкция не выбрана. Выберите конструкцию</h2></td></tr>";
                }
               ?>
                </tbody>
            </table>
        </div>
    <div class="text-center">
    <?php
    $cnt=0;
    if($_GET){
    $constc=intval($_SESSION['constcnt']);}
        if($constc%10==0){
            $cnt=intval($constc/10);
        }
    else {
        $cnt=intval($constc/10)+1;
    }
    if($_GET){
        if($cnt>1){
        for($i=1;$i<=$cnt;$i++){
            ?>
            <a  class="btn btn-default <?php if($_GET['p']==$i){ echo "active";} ?>" href="consSearch.php?p=<?= $i; ?>"><?= $i; ?></a>
    <?php }
        }
    }
    ?>
    </div>
    </div>
<br/>
</div>
</body>
<?php
if($cnt<4){
    echo "<div style='margin-top: 280px'></div>";
}
include "footer.php"?>
</html>

