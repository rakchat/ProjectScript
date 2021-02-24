<?php 

    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['user']);
    unset($_SESSION['photo']);
    unset($_SESSION['userlevel']);
    unset($_SESSION['success']);
    header("Location: form_login.php");

?>