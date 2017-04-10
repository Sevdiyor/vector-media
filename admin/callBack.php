<?php
include "navbar.php";

$calls = $pdo->query("SELECT * FROM callback")->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['callback_id'])){
    $callback_id = $_GET['callback_id'];
    $result = $pdo -> exec("delete  from callback where callback_id = $callback_id");
    header("Location: callback.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Список обратных звонков</title>
</head>
<body>
<div class="container">
    <h1 class="text-center">Список обратных звонков</h1>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Телефон номер</th>
            <th>Электронная почта</th>
            <th>Собшение</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody><?php $cnt=0; ?>
        <?php
        foreach($calls as $c):?>
            <tr>
                <td><?php $cnt+=1; echo($cnt)?></td>
                <td><?php echo($c['phone'])?></td>
                <td><?php echo($c['email'])?></td>
                <td><?php echo($c['ab'])?></td>

                <td>
                    <a href="callBack.php?callback_id=<?=$c['callback_id']?>"><button class="btn btn-danger"
                                title="delete this callBack"><span class="glyphicon glyphicon-minus-sign"></span></button></a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
<?php include"footer.php"?>
</html>