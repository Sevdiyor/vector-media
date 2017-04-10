<?php
/**
 * Created by PhpStorm.
 * User: Sevdiyor
 * Date: 21.11.16
 * Time: 13:44
 */
include "connect.php";
include "navbar.php";
  $new = $pdo -> query("select * from news")->fetchAll();

if (!$new) header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>новости</title>
</head>
<body>
<br/>
<div class="container">
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
        <?php foreach($new as $n){?>
            <tr>
                <td><?php echo $n["title"]?></td>
                <td><img src="../images/news/<?php echo $n["image"]?>.png" width="120"></td>
                <td><?php echo $n["text"]?></td>
                <td>
                    <a href="editNews.php?news_id=<?=$n["news_id"]?>"><button class="btn btn-warning" title="edit this phone new"><span class="glyphicon glyphicon-edit"></span></button></a><br/><br/>
                    <a href="delete.php?news_id=<?=$n['news_id']?>"><button class="btn btn-danger" title="delete this new"><span class="glyphicon glyphicon-minus-sign"></span></button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
<?php include"footer.php"?>
</html>