<?php
    // remove cookie
    setcookie('type', '');

    //back to the quiz
    header("Location: index.php");
    exit();
?>