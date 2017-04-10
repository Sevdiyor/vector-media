<?php
include "connect.php";
if(isset($_POST['sbmt'])){
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $ab = $_POST['ab'];
    $result = $pdo->prepare("insert into callback(phone, email, ab) VALUES (?, ?, ?)")->execute(array(
        $phone, $email, $ab));
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../lib/css/main.css" rel="stylesheet">
</head>
<body>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="margin-top: 1%; font-family: Arial; font-size: 16px">
                &copy; 2017 <a href="http://info-x.uz">Art_quest</a>.
                All Rights Reserved.
            </div>
            <div class="col-sm-8 pull-right" style="margin-top: 1%">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="new.php">Новости</a></li>
                    <li><a href="brons.php">Заявки</a></li>
                    <li><a href="vmgorder.php">Бронированные</a></li>
                    <li><a href="callBack.php">Обратные звонки</a></li>
                    <li><a href="add.php">Добавить</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>