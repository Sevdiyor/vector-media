<?php
include "connect.php";
include "lock.php";
include "navbar.php";

$brons = $pdo->query("SELECT * FROM cart
                      join construc c on c.construc_id=cart.construc_id
                      join type t on t.type_id=c.type_id
                      join format f on f.format_id=c.format_id order by cart.cart_id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Список заказанных конструкци</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Список заказанных конструкци</h1>
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
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?=$b['cart_id']?>"><span class="glyphicon glyphicon-check"></span></button>
                        <div id="<?=$b['cart_id']?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Вы точно хотите добавить в список бронированных</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3>даты который заказал клиент</h3>
                                        <p>начало: <b class="text-success"><?php echo $b["start_date"]?></b> конец: <b class="text-success"><?php echo $b["end_date"]?></b></p>
                                        <form role="form" method="post" action="bron.php?add_id=<?=$b['cart_id']?>">
                                            <input class="form-control" type="date" name="sdate" placeholder="start..." min="<?=date('Y-m-d')?>"    /><br/>
                                            <input class="form-control" type="date" name="edate" placeholder="end..."min="<?=date('Y-m-d')?>"/><br/>
                                            <br/>
                                            <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="добавить в список">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/><br/>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?=$b['cart_id']."l"?>">
                            <span class="glyphicon glyphicon-minus-sign"></span></button>
                        <div id="<?=$b['cart_id']."l"?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Вы точно хотите удалить из список заявок</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="bron.php?del_id=<?php echo $b['cart_id']?>">
                                            <br/>
                                            <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="удалить из список">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
</body>
<?php include"footer.php"?>
</html>