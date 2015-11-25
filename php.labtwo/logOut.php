<?php

session_start();
unset($_SESSION['email']);

header('Location: http://php.labtwo/authorization.php');

?>