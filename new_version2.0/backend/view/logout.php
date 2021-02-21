<?php 

    session_start();
    session_destroy();
    header("Location: ../../frontend/form_login.php");

?>