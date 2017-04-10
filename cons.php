<?php
    include "header.php";

if($_GET && isset($_GET['id'])){
    $id = (int)$_GET["id"];
    $dates=date('Y-m-d');
    $cons = $pdo->query("SELECT * FROM construc con
    join vmgorder o on o.construc_id=con.construc_id
    join type t on t.type_id=con.type_id
    join format f on f.format_id=con.format_id
    where con.construc_id=$id and o.end_date>'$dates'")->fetchAll();
    $cons_name= $pdo->query("SELECT * FROM construc con
    join type t on t.type_id=con.type_id
    join format f on f.format_id=con.format_id
    where con.construc_id=$id")->fetch();
}
?>
    <br/>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12"><img class="img-responsive" src="images/constructions/<?php echo $cons_name["img"] ?>.png" style="width: 100%"/></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h3><?php echo $cons_name["type_name"] ?></h3>
            <b><p class="text-justify"><?php echo $cons_name["format_name"] ?></p></b>
            <?php foreach($cons as $c){?>
                <ul>
                    <li>с <?=$c['start_date']?> до <?=$c['end_date']?></li>
                </ul>
            <?php } ?>
        </div>
        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Забронировать</button>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Забронирование конструкцию</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="bron.php?id=<?= $id ?>">
                            <input class="form-control" type="text" name="fio" placeholder="ФИО..." required="required"/><br/>
                            <input class="form-control" type="number" name="phone" placeholder="tel..." value="9989" required="required"/><br/>
                            <input class="form-control" type="email" name="email" placeholder="email..." required="required"/><br/>
                            <label for="sdate">Выберите начальную дату (пример: 2016-09-22)</label>
                            <input class="form-control" type="date" name="sdate" placeholder="start..." min="<?=date('Y-m-d')?>"  id="sdate"  required="required"/><br/>
                            <label for="edate">Выберите дату окончание (пример: 2016-10-22)</label>
                            <input class="form-control" type="date" name="edate" placeholder="end..."min="<?=date('Y-m-d')?>" id="edate" required="required"/><br/>
                            <br/>
                            <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="бронировать">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="consSearch.php"><button class="btn btn-default pull-right"><i class="fa fa-chain"></i> назад на подбор</button></a><br/><br/><br/>
</div>
</body>
<?php include "footer.php" ?>
</html>
