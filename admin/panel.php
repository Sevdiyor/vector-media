<?php
include "connect.php";
$result=$pdo->query("SELECT MAX(`news_id`) as maximum FROM `news`")->fetchAll();
$id=($result[0][0]);
$news = $pdo->query("SELECT * FROM news where news_id=$id ")->fetchAll();
$clients=$pdo->query("select * from clients")->fetchAll();
?>
<br/>
<div >
    <div id="menu">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#home"><h4>Новости компании</h4></a></li>
            <li><a data-toggle="tab" href="#menu1"><h4>Услуги</h4></a></li>
            <li><a data-toggle="tab" href="#menu2"><h4>Сотрудники</h4></a></li>
            <li><a data-toggle="tab" href="#menu3"><h4>Конструкция</h4></a></li>
            <li><a data-toggle="tab" href="#menu4"><h4>Клиенты</h4></a></li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h3>Новости компании</h3></a>
                            </h4>
                        </div>
                            <?php foreach($news as $new){?>
                                    <div id="collapse1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="col-md-12 col-sm-12 col-xs-12 text-justify">
                                                <div class="col-md-3 col-sm-4 col-xs-4">
                                                    <img class="btn btn-block" src="../images/news/<?php echo $new["news_id"] ?>.png" alt=""/>
                                                </div>
                                                <h3><?php echo $new["title"]?></h3>
                                                <p><?php echo $new["text"]?></p>
                                                <div class="pull-right">
                                                    <a href="new.php" class="btn btn-default">
                                                        <i class="fa fa-chain"></i> Все новости
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <?php include "facility.php"?>
            </div>
            <div id="menu2" class="tab-pane fade">
                <?php include "staff.php"?>
            </div>
            <div id="menu3" class="tab-pane fade">
                <?php include "construc.php"?>
            </div>
            <div id="menu4" class="tab-pane fade">
                <?php include "client.php"?>
            </div>
        </div>
    </div>
</div>
