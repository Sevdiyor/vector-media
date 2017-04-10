<?php
error_reporting(null);
include "admin/connect.php";
if(isset($_POST['sbmt'])){
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $ab = $_POST['ab'];
    $result = $pdo->prepare("insert into callback(phone, email, ab) VALUES (?, ?, ?)")->execute(array(
        $phone, $email, $ab));
//    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html"; charset="UTF-8">
    <link rel="stylesheet" href="lib/css/bootstrap.css">
    <link rel="stylesheet" href="lib/css/main.css"/>
    <link rel="stylesheet" href="lib/css/font-awesome.css">
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/selects.js"></script>
    <link rel="icon" href="images/ic.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/css/w3.css">
</head>
<body style="background-color: #ffffff" >
<div class="container">
    <div class="row" style="margin-top: 10px">
        <div class="col-md-3 col-sm-4 col-xs-6">
            <a href="index.php"><img style="width: 100%" src="images/vmglogo.png" alt=""/></a>
        </div>
        <div class="col-md-6 col-sm-4 col-xs-6">
            <a href="consSearch.php" class="btn btn-info btn-block" style="margin-bottom: 3px; padding: 2% 0 2% 0; font-size: 107%">
                Мы к Вашим услугам
            </a>
            <form role="search" action="search.php" style="margin-bottom: 3px">
                <div class="input-group">
                    <input type="text" name="text" class="form-control text-center" placeholder="Что искать ?"/>
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
            <button class="btn btn-info btn-block pull-right" style="padding: 4% 0 4% 0; font-size: 157%" data-toggle="modal" data-target="#myModalll">Заказать<br/>обратный звонок</button>
            <div id="myModalll" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="color: #000000">Оставить телефон номер и собшение</h4>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" action="footer.php">
                                <label for="phone" style="color: #3c3c3c">Телефон</label>
                                <input class="form-control" type="number" name="phone" style="font-family: 'Roboto', 'Avenir Next', sans-serif" placeholder="+9989xyyyxxyy" required="required"/><br/>
                                <label for="email" style="color: #3c3c3c">E-mail</label>
                                <input class="form-control" type="email" name="email" placeholder="art_quest@gmail.com"/><br/>
                                <label for="ab" style="color: #3c3c3c">Собшение</label>
                                <textarea class="form-control" name="ab" id="" cols="30" rows="7" placeholder="оставте собшение..."></textarea>
                                <br/>
                                <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="отправить">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>