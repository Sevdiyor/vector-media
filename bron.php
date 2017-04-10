<?php
include "admin/connect.php";
include "header.php";
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 09.12.16
 * Time: 12:41
 */
if($_GET['id']){
    $id=$_GET['id'];
    $dates=date('Y-m-d');
    $fio = $_POST['fio'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $sdate=$_POST['sdate'];
    $edate=$_POST['edate'];

    $result = $pdo->prepare("insert into cart(construc_id, start_date, end_date, datee, fio, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)")->execute(array(
        $id, $sdate, $edate, $dates, $fio, $phone, $email));
}
//header("Location:cons.php?id=".$id);

if($result){
    ?>
    <script>
        $(document).ready(function() {
            $("#clickk").click();
        });
    </script>
    <button id="clickk" type="button"  class="hidden   btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Забронировать</button>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Забронирование конструкцию</h4>
                </div>
                <div class="modal-body">
                    Забранировано
                </div>
                <div class="modal-footer">
                    <a href="consSearch.php" class="btn btn-primary pull-right">Назад</a>
                </div>
            </div>
        </div>
    </div>

<?php
}

?>