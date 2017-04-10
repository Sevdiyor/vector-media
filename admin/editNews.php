<?php

include "navbar.php";
if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];
    $new = $pdo->query("select * from news where news_id='$news_id'")->fetch();
}
if (isset($_POST['sbmt'])) {
    if(isset($_FILES['img'])){
        $uploaddir = $_SERVER["DOCUMENT_ROOT"] . '/images/news/';
        $uploadfile = $uploaddir.$news_id.".png";
        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
    }
    $title = $_POST['title'];
    $text = $_POST['text'];
    $pdo->exec("UPDATE `news` SET `title`='$title',`text`='$text' where news_id='$news_id'");
    header("Location:new.php");
}
?>
<div class="col-xs-6 col-xs-offset-3">
    <form role="form" method="post" action="editNews.php?news_id=<?= $news_id; ?>" enctype="multipart/form-data">
        <input class="form-control" type="file" name="img"/><br/>
        <input class="form-control" type="text" name="title" value="<?= $new["title"] ?>"/><br/>
        <textarea class="form-control" type="text" name="text" id="" cols="30" rows="7"
                  placeholder="пишите о новость"> <?=$new['text']?> </textarea><br/>
        <input type="submit" class="btn btn-primary btn-block" name="sbmt" value="Изменить">
    </form>


</div>