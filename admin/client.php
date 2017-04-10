<?php
include "lock.php";
$clients = $pdo -> query("select * from clients")->fetchAll();

if(isset($_GET['dell_id'])){
    $dell_id = $_GET['dell_id'];
    $result = $pdo -> exec("delete  from clients where cl_id = $dell_id");
    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/clLogos/';
    $uploadfile = $uploaddir.$dell_id.".png";
    unlink($uploadfile);
    header("Location: index.php");
}
?>
<br/>
<table class="table table-hover table-bordered table-striped">
    <thead>
    <tr>
        <th>Название компании</th>
        <th>Логотип</th>
        <th>Сайт</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($clients as $c){?>
        <tr>
            <td><?php echo $c["cl_name"]?></td>
            <td><img src="../images/clLogos/<?php echo $c["logo"]?>.png" width="120"></td>
            <td><?php echo $c["site"]?></td>
            <td>
                <a href="editClient.php?cl_id=<?=$c["cl_id"]?>"><button class="btn btn-warning" title="edit this client"><span class="glyphicon glyphicon-edit"></span></button></a>
                <a href="client.php?dell_id=<?=$c['cl_id']?>"><button class="btn btn-danger" title="delete this client"><span class="glyphicon glyphicon-minus-sign"></span></button></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>