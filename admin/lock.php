<?php
include "connect.php";

if (!isset($_SERVER['PHP_AUTH_USER']))

{
    Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
    Header ("HTTP/1.0 401 Unauthorized");
    exit();
}

else {
    if (!get_magic_quotes_gpc()) {
        $_SERVER['PHP_AUTH_USER'] = mysql_escape_string($_SERVER['PHP_AUTH_USER']);
        $_SERVER['PHP_AUTH_PW'] = mysql_escape_string($_SERVER['PHP_AUTH_PW']);
    }

    $query = "SELECT pwd FROM userlist WHERE user_name='".$_SERVER['PHP_AUTH_USER']."'";

    $lst = $pdo->query($query)->fetchAll();

    if (empty($lst) || count($lst) != 1 || $_SERVER['PHP_AUTH_PW'] != $lst[0]['pwd'])
    {
        Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
        Header ("HTTP/1.0 401 Unauthorized");
        exit();
    }

}

?>