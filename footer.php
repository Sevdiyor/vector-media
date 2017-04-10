<?php
error_reporting(null);
include "admin/connect.php";
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
    <link href="lib/css/main.css" rel="stylesheet">
</head>
<body>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="margin-top: 1%; font-family: Arial; font-size: 16px">
                &copy; 2017 <a href="http://info-x.uz">art_quest</a>.
                All Rights Reserved.
            </div>
            <div class="col-sm-4" style="margin-top: 1%">
                <ul>
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="consSearch.php">Подбор конструкци</a></li>
                    <li><a href="new.php">Новости</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <button type="button" class="btn btn-lg btn-default  pull-right" data-toggle="modal" data-target="#myModall">Обратный звонок</button>
                <div id="myModall" class="modal fade" role="dialog">
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
</footer>
</body>
</html>