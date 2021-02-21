<?php 

    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['user']);
    unset($_SESSION['photo']);
    unset($_SESSION['userlevel']);
    header("Location: ../../frontend/form_login.php");

?>