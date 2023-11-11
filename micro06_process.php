<?php
    //grab data from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //validate data

    if($username && $password){
        if($username == 'pikachu' && $password == 'pokemon'){
            header("Location: micro06.php?error=none");
            print "<div>You are logged in!</div>";
            exit();
        }
        else{
            header("Location: micro06.php?error=incorrect");
            exit();
        }  
    }
    else if(!$username && $password){
       
        header("Location: micro06.php?error=username");
        exit();
    }
    else if($username && !$password){
       
        header("Location: micro06.php?error=password");
        exit();
    }
    else{
        //send user back to form
        header("Location: micro06.php?error=missing");
        exit();
    }
?>