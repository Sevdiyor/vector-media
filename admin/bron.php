<?php
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 12.12.16
 * Time: 11:43
 */
include "connect.php";

    if(isset($_GET['add_id'])){
    $id=$_GET['add_id'];
        $cart = $pdo -> query("select * from cart where cart_id=$id")->fetch();
        $dates=date('Y-m-d');
        $con_id = $cart['construc_id'];
        $fio = $cart['fio'];
        $phone=$cart['phone'];
        $email=$cart['email'];
        $sdate=$_POST['sdate'];
        $edate=$_POST['edate'];
        $result = $pdo->prepare("insert into vmgorder(construc_id, start_date, end_date, datee, fio, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)")->execute(array(
            $con_id, $sdate, $edate, $dates, $fio, $phone, $email));
        if($result)
        $del = $pdo->exec("DELETE FROM cart WHERE cart_id=$id");
        else{
            echo "bla bla bla";
        }
}
else{
    if(isset($_GET['del_id']))
        $id = $_GET['del_id'];
    $del = $pdo->exec("DELETE FROM cart WHERE cart_id=$id");
}

header("Location: brons.php");
?>
