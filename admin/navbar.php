<?php
//session_start();
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 12.11.2016
 * Time: 11:17
 */
include "connect.php";
include "lock.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html"; charset="UTF-8">
    <link rel="stylesheet" href="../lib/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/css/main.css"/>
    <link rel="stylesheet" href="../lib/css/font-awesome.css">
    <link rel="stylesheet" href="../lib/fonts/">
    <script src="../lib/js/jquery-3.1.1.js"></script>
    <script src="../lib/js/bootstrap.min.js"></script>
    <link rel="icon" href="../images/ic.png"/>
</head>
<body>
    <div class="container">

            <div class="navbar navbar-inverse">
                <div class="row">
                <div class="col-xs-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">Menu
                        </button>
                    </div>

                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-left">
                            <li><a class="btn-lg" href="index.php"><i class="git fa fa-home">&nbsp; Главная</i></a></li>
                            <li><a class="btn-lg" href="brons.php"><i class="git fa fa-shopping-cart">&nbsp; Заявки</i></a></li>
                            <li><a class="btn-lg" href="vmgorder.php"><i class="git fa fa-cube">&nbsp; Бронированные</i></a></li>
                            <li><a class="btn-lg" href="callBack.php"><i class="git fa fa-phone-square">&nbsp; Обратные звонки</i></a></li>
                            <li><a class="btn-lg" href="add.php"><i class="git fa fa-phone-square">&nbsp; Добавить</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
