<?php
include "admin/connect.php";
$result=array();
if(isset($_GET['text'])){
    $text=$_GET['text'];
    $result=$pdo ->query("select * from construc c
    JOIN type t on t.type_id=c.type_id
     JOIN format f on f.format_id=c.format_id
     WHERE adress LIKE '%$text%' or format_name LIKE '%$text%' or type_name LIKE '%$text%' OR cost LIKE '%$text%' ")->fetchAll();
    $alert = false;
    if($result==null){
        $alert=true;
    }
}
include "header.php";
?>
<div class="container">
    <br><br>
    <table class="table table-bordered table-hover">
        <tr>
            <th>ФОТО</th>
            <th>Тип конструкции</th>
            <th>Формат</th>
            <th>Дислокация</th>
            <th>Цена (USD/месяц)</th>
        </tr>

        <?php

        foreach($result as $r){ ?>
            <tr>
                <td>
                    <a href="cons.php?id=<?php echo $r["construc_id"]?>" class="btn">
                        <img src="images/constructions/<?php echo $r["img"]?>.png" alt="<?php echo $r["type_id"]?>" width="120">
                    </a>
                </td>
                <td><?php echo $r["type_name"]?></td>
                <td><?php echo $r["format_name"] ?></td>
                <td><?php echo $r["adress"]; ?></td>
                <td><?php echo $r["cost"]; ?></td>
            </tr>
        <?php } ?>

    </table>
    <?php
    if($alert){
        echo("<h2 class='text-center'>ничего не найдено</h2>");
    }
    ?>
</div>
<?php include "footer.php"?>