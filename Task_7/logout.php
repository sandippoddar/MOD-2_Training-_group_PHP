<?php
    session_start();
    $_SESION = array();
    session_destroy();
    header("location: login.php");
    exit();
?>
