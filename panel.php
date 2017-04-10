<?php
include "admin/connect.php";
$result=$pdo->query("SELECT MAX(`news_id`) as maximum FROM `news`")->fetchAll();
$id=($result[0][0]);
$news = $pdo->query("SELECT * FROM news where news_id=$id ")->fetchAll();
$clients=$pdo->query("select * from clients")->fetchAll();
?>
        <div>
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#home"><h4>Главная</h4></a></li>
                <li><a data-toggle="tab" href="#menu1"><h4>Услуги</h4></a></li>
                <li><a data-toggle="tab" href="#menu2"><h4>Сотрудники</h4></a></li>
                <li><a data-toggle="tab" href="#menu3"><h4>Фотогалерея</h4></a></li>
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
                                            <div class="col-md-3 col-sm-4 col-xs-4">
                                                <img src="images/news/<?php echo $new["image"] ?>.png" class="img-responsive img-thumbnail" alt=""/>
                                            </div>
                                            <h3><?php echo $new["title"]?></h3>
                                            <p class="te"><?php echo substr($new["text"],0,500)."..."; ?></p>
                                            <div class="pull-right">
                                                <a href="/new.php?id=<?=$new["news_id"]?>" class="btn btn-default">
                                                    <i class="fa fa-chain"></i> подробно
                                                </a><br/><br/>
                                                <a href="/new.php" class="btn btn-default">
                                                    <i class="fa fa-chain"></i> Все новости
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        <h3>О нас</h3></a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <br/>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-justify">
                                        <p>Проект "Vector Media Group" объединил специалистов с многолетним стажем работы в
                                            области наружной рекламы. Наша основная деятельность — изготовление наружной
                                            рекламы. Также предоставляем услуги по изготовлению интерьерной рекламы в городе
                                            Ургенч и Хорезмской области. <br/><br/>
                                            Мы обладаем собственными производственными мощностями, а также сварочными и
                                            сборочными цехами. Это позволяет нам самостоятельно изготавливать рекламные
                                            конструкции любых габаритов и типов сложности, что в конечном итоге значительно
                                            удешевляет процесс производства. <br/><br/>
                                            аказ поступает в работу с момента его получения, поэтому сроки его выполнения
                                            обычно колеблются от 3 до 15 рабочих дней (в зависимости от уровня сложности).
                                            Согласование наружной рекламы — в посвященном этому процессу разделе.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                        <h3>Hаше клиенты</h3></a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                        <?php foreach($clients as $cl){?>
                                            <div class="col-md-2 col-sm-3 col-xs-6"><br/>
                                                <ul class="list-inline">
                                                    <li><a class="test" data-toggle="tooltip" href="<?php echo($cl['site'])?>" data-placement="bottom"
                                                           title="<?php echo $cl["cl_name"]?>">
                                                            <img style="width: 100%" src="images/clLogos/<?php echo $cl["cl_id"]?>.png" class=" thumbnail center-block" alt=""/>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <script>
                                                    $(document).ready(function () {
                                                        $('[data-toggle="tooltip"]').tooltip();
                                                    });
                                                </script>
                                            </div>
                                        <?php } ?>
                                </div>
                            </div>
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
                    <?php include "gallery.php"?>
                </div>
            </div>
        </div>
</body>
<?php
//include "footer.php";
?>
</html>
