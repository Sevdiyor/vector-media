<?php
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 01.02.17
 * Time: 20:19
 */

include "connect.php";
include "lock.php";
if(isset($_GET['news_id'])){
    $news_id = $_GET['news_id'];
    $result = $pdo->exec("DELETE FROM news WHERE news_id={$news_id}");
    $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/news/';
    $uploadfile = $uploaddir.$news_id.".png";
    unlink($uploadfile);
}
header("Location: new.php");