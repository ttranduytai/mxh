<?php
session_start();
session_destroy();
unset($_SESSION['id']);
header('location:http://localhost/mxh1/admin/index.php');
exit();
?>