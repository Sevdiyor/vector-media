<?php
include "connect.php";
include "lock.php";
$staff = $pdo->query("SELECT * FROM staff")->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['dell_id'])){
    $dell_id = $_GET['dell_id'];
    $result = $pdo -> exec("delete  from staff where st_id = $dell_id");
    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/staff/';
    $uploadfile = $uploaddir.$dell_id.".png";
    unlink($uploadfile);
    header("Location: index.php");
}
?>
    <h1 class="text-center">Список сотрудников</h1>
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Фото</th>
            <th>Имя</th>
            <th>Профессия</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody><?php $cnt=0; ?>
        <?php
        foreach($staff as $s):?>
            <tr>
                <td><?php echo($cnt+=1)?></td>
                <td><img src="../images/staff/<?php echo $s["st_img"]?>.png" width="120"></td>
                <td><?php echo($s['st_name'])?></td>
                <td><?php echo($s['st_proff'])?></td>
                <td>
                    <a href="editStaff.php?st_id=<?=$s["st_id"]?>"><button class="btn btn-warning" title="edit this person"><span class="glyphicon glyphicon-edit"></span></button></a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?=$s['st_id']."l"?>">
                        <span class="glyphicon glyphicon-minus-sign"></span></button>
                    <div id="<?=$s['st_id']."l"?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Вы точно хотите удалить из списка</h4>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="staff.php?dell_id=<?php echo $s['st_id']?>">
                                        <br/>
                                        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="удалить из список">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>