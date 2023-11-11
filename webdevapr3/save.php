<?php
    $color = $_POST['color'];

    if(!$color){
        //send back to form and tell them to fill out
        header("Location: quiz.php?error=forgot");
        exit();
    }

    if($color == 'y'){
        $char = 'homer';
    }
    else if($color == 'b'){
        $char = 'marge';
    }
    else{
        $char = 'lisa';
    }

    //save to file
    $filename = getCWD() . 'data/results.txt';
    file_put_contents($filename, $char . "/n", FILE_APPEND);

    //set cookie
    setcookie('character', $char);

    //send back to see result
    header("Location: quiz.php");
    exit();
?>