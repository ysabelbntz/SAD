<?php
session_start();
unset($_SESSION['valid_user']);
session_destroy();
$cookieParams = session_get_cookie_params();
setcookie(session_name(), '', 0, $cookieParams['path'], $cookieParams['domain'], $cookieParams['secure'], $cookieParams['httponly']);
$_SESSION = array();
echo ('<meta http-equiv="refresh" content="0;URL=index.php"/>');
?>