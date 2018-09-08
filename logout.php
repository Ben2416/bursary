<?php
session_start();
session_unset();
$_SESSION = array();
session_destroy();
header("Location:index.php?hr=".urlencode($_SERVER['HTTP_REFERER']));
exit();
?>