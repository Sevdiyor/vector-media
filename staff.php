<?php
$staff = $pdo -> query("select * from staff")->fetchAll();
?>
<div class="row">
    <?php foreach($staff as $st){?>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <br/>
            <br/>
            <br/>
            <ul class="list-inline">
                <li><a class="test" data-toggle="tooltip" data-placement="top" title="<?php echo $st["st_name"]?> (<?php echo $st["st_proff"]?>)">
                        <img style="width: 100%" src="images/staff/<?php echo $st["st_img"] ?>.png" class="center-block huerotate" alt=""/>
                    </a>
                </li>
            </ul>
        </div>

    <?php } ?>
</div>