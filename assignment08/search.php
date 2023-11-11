<?php
    //grab data from user
    $search = $_POST['search'];

    if($search){
        
        //redirect back
        header("Location: search_form.php?search=$search");
        exit();
    }
    else{
        // send them back to the form and tell them to fill it out
        header("Location: search_form.php?error=forgot");
        exit();
    }

?>