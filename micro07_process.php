<?php
    //grab data from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = getcwd() . '/data/micro07.txt';

    //validate data

    if($username && $password){
        if($username == 'pikachu' && $password == 'pokemon'){
            $log = "successful";

            setcookie('log', $log);
            file_put_contents($file, $log . "\n", FILE_APPEND);

            header("Location: micro07.php?error=successful");
            print "<div>You are logged in!</div>";
            exit();
        }
        else{
            $log = "unsuccessful";
            file_put_contents($file, $log . "\n", FILE_APPEND);

            header("Location: micro07.php?error=unsuccessful");
            exit();
        }  
    }
    else{
        $log = "missing";
        file_put_contents($file, $log . "\n", FILE_APPEND);

        header("Location: micro07.php?error=missing");
        exit();
    }
?>