<?php
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 12.11.2016
 * Time: 11:15
 */
session_start();
include "header.php";
$_SESSION['type']=0;
$_SESSION['format']=0;
$_SESSION['constcnt']=0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vector Media Group</title>
    <link rel="icon" href="images/ic.png"/>
</head>
<body>
<div class="container">
    <?php include "carousel.php"?>
    <br/>
    <?php include "panel.php" ?><br/><br/><br/>
</div>
</body>
<?php
include "footer.php";
?>
</html>