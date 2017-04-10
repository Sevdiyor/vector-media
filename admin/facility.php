<?php
include "lock.php";
$facility = $pdo -> query("select * from facility")->fetchAll();
if(isset($_GET['dell_id'])){
    $dell_id = $_GET['dell_id'];
    $result = $pdo -> exec("delete  from facility where fc_id = $dell_id");
    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/facility/';
    $uploadfile = $uploaddir.$dell_id.".png";
    unlink($uploadfile);
    header("Location: index.php");
}
?>
<br/>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($facility as $f){?>
            <tr>
                <td><?php echo $f["fc_name"]?></td>
                <td><img src="../images/facility/<?php echo $f["fc_img"]?>.png" width="120"></td>
                <td><?php echo $f["fc_text"]?></td>
                <td>
                    <a href="editFacility.php?fc_id=<?=$f["fc_id"]?>"><button class="btn btn-warning" title="edit this phone new"><span class="glyphicon glyphicon-edit"></span></button></a><br/><br/>
                    <a href="facility.php?dell_id=<?=$f['fc_id']?>"><button class="btn btn-danger" title="delete this new"><span class="glyphicon glyphicon-minus-sign"></span></button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>