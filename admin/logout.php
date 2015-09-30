<?php
//include config
require_once('../include/config.php');

//log user out
$user->logout();
header('Location: index.php'); 

?>