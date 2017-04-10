<?php
$facility = $pdo -> query("select * from facility")->fetchAll();
?>

<br/>
    <a href="consSearch.php" class="btn btn-default center-block btn-lg">
        <i class="fa fa-binoculars"></i> Подбор конструкцый
    </a><br/>
    <?php foreach($facility as $fc){?>
        <div class="panel panel-default">
            <div class="panel-heading"><h3><?php echo $fc["fc_name"] ?></h3></div>
            <div class="panel-body">
                <div class="col-md-2 col-sm-4 col-xs-4"><img class="img-responsive" src="images/facility/<?php echo $fc["fc_img"] ?>.png" alt="<?php echo $fc["fc_name"] ?>"/></div>
                <b><p class="text-justify"><?php echo $fc["fc_text"] ?></p></b>
            </div>
        </div>
    <?php } ?>
