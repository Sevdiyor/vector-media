<?php
include "admin/connect.php";
$construc = $pdo->query("SELECT * FROM construc c
                            join type t on t.type_id = c.type_id
                            join format f on f.format_id=c.format_id")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>PhotoTeam | Gallery</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="lib/layout/styles/layout.css" type="text/css" />
    <!-- prettyPhoto -->
    <link rel="stylesheet" href="lib/layout/scripts/prettyphoto/prettyPhoto.css" type="text/css" />
    <script type="text/javascript" src="lib/layout/scripts/prettyphoto/jquery.prettyPhoto.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("a[rel^='prettyPhoto']").prettyPhoto({
                theme: 'dark_rounded',
                overlay_gallery: false,
                social_tools: false
            });
        });
    </script>
    <!-- / prettyPhoto -->
</head>
<body>
<!--<div class="row">-->
<!--    <div class="clear">-->
<!--        <div class="row">-->
<div class="clear">
    <div class="row">
        <?php foreach($construc as $c){?>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <br/>
                <a href="images/constructions/<?php echo $c["img"]?>.png" rel="prettyPhoto[gallery1]" title="Ориентир: <?php echo $c["adress"]?>"><img src="images/constructions/<?php echo $c["img"]?>.png" alt="<?php echo $c["type_name"]?>" style="width: 100%" /></a>
            </div>
        <?php } ?>
    </div>
</div>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</body>
</html>