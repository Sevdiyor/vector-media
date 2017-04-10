<?php
include "connect.php";
include "lock.php";
include "navbar.php";

if(isset($_POST['cons'])){
    $brons = $pdo->query("SELECT * FROM vmgorder v
                      join construc c on c.construc_id=v.construc_id
                      join type t on t.type_id=c.type_id
                      join format f on f.format_id=c.format_id order by v.construc_id")->fetchAll(PDO::FETCH_ASSOC);
}
else{
    $brons = $pdo->query("SELECT * FROM vmgorder v
                      join construc c on c.construc_id=v.construc_id
                      join type t on t.type_id=c.type_id
                      join format f on f.format_id=c.format_id order by v.order_id")->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_GET['dell_id'])){
    $dell_id = $_GET['dell_id'];
    $result = $pdo -> exec ("delete from vmgorder where order_id = $dell_id");
    header("Location: vmgorder.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Список бронированных конструкци</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Список бронированных конструкци</h1><br/>
    <form action="vmgorder.php" role="form" method="post" >
        <div class="pull-right input-group">
<!--            <input type="submit" class="btn btn-default form-group" name="cons" value="сортировать по конструкци"/><span class="form-group fa fa-desktop"></span>-->
<!--            <input type="submit" class="btn btn-default" name="bron" value="сортировать по заказанную дату"/>-->
            <button class="btn btn-default" type="submit" name="cons" style="margin-right: 20px">сортировать по конструкци <span class="fa fa-desktop"></span></button>
            <button class="btn btn-default" type="submit" name="bron">сортировать по заказанную дату <span class="fa fa-calendar"></span></button>
        </div>
    </form>

    <br/><br/>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>ФОТО</th>
            <th>О конструкци</th>
            <th>Заказанные дни</th>
            <th>О клиента</th>
            <th>Когда заказал</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach($brons as $b):?>
                <tr>
                    <td><?php echo $b["construc_id"]?></td>
                    <td><img src="../images/constructions/<?php echo $b["img"]?>.png" alt="<?php echo $b["type_id"]?>" width="120"></td>
                    <td>
                        <h4>Тип: <?php echo $b["type_name"]?></h4>
                        <h4>Размер: <?php echo $b["format_name"]?></h4>
                        <p>Ориэнтир: <?php echo $b["adress"]?></p>
                        <h4>Сумма: <?php echo $b["cost"]?></h4>
                    </td>
                    <td>
                        <h4>дата начало: <?php echo $b["start_date"]?></h4>
                        <h4>дата окончани: <?php echo $b["end_date"]?></h4>
                    </td>
                    <td>
                        <h4><?php echo $b["fio"]?></h4>
                        <h4>+<?php echo $b["phone"]?></h4>
                        <h4><?php echo $b["email"]?></h4>
                    </td>
                    <td>
                        <h4><?php echo $b["datee"]?></h4>
                    </td>

                    <td>
                        <a href="vmgorder.php?dell_id=<?=$b['order_id']?>"><button class="btn btn-danger" title="delete this order"><span class="glyphicon glyphicon-minus-sign"></span></button></a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</body>
<?php include"footer.php"?>
</html>