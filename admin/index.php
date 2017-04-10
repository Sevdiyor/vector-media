<?php
include "connect.php";
include "lock.php";
include "navbar.php";
$new = $pdo -> query("select * from news")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        admin's page
    </title>
</head>
<body>
<div class="container">
    <?php include"carousel.php"?>
    <h2 class="text-center text-primary">Admin's page</h2>
    <?php include "panel.php"?>
</div>
</body>
<?php include "footer.php"?>
</html>