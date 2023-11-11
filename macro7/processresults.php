<?php

    // grab the incoming data
    $drink = $_POST['drink'];
    $activity = $_POST['activity'];
    $music = $_POST['music'];
    $season = $_POST['season'];

    $jcount = 0;
    $ncount = 0;
    $pcount = 0;
    $scount = 0;

    // validate the data
    if (!$drink) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: index.php?error=forgot");
        exit();
    }
    if (!$activity) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: index.php?error=forgot");
        exit();
    }
    if (!$music) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: index.php?error=forgot");
        exit();
    }
    if (!$season) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: index.php?error=forgot");
        exit();
    }


    if ($drink == 'j') {
        $jcount++;
    }
    else if ($drink == 'n') {
        $ncount++;
    }
    else if ($drink == 'p') {
        $pcount++;
    }
    else if ($drink == 's') {
        $scount++;
    }


    if ($activity == 'j') {
        $jcount++;
    }
    else if ($activity == 'n') {
        $ncount++;
    }
    else if ($activity == 'p') {
        $pcount++;
    }
    else if ($activity == 's') {
        $scount++;
    }


    if ($music == 'j') {
        $jcount++;
    }
    else if ($music == 'n') {
        $ncount++;
    }
    else if ($music == 'p') {
        $pcount++;
    }
    else if ($music == 's') {
        $scount++;
    }
    

    if ($season == 'j') {
        $jcount++;
    }
    else if ($season == 'n') {
        $ncount++;
    }
    else if ($season == 'p') {
        $pcount++;
    }
    else if ($season == 's') {
        $scount++;
    }
    
    if (max($jcount, $ncount, $pcount, $scount) == $jcount){
        $type = 'Jail';
    }
    else if (max($jcount, $ncount, $pcount, $scount) == $ncount){
        $type = 'Normal';
    }
    else if (max($jcount, $ncount, $pcount, $scount) == $pcount){
        $type = 'Pirate';
    }
    else if (max($jcount, $ncount, $pcount, $scount) == $scount){
        $type = 'Sleepy';
    }

    // save the data to a file on the server
    $filename = getcwd() . '/data/results.txt';
    file_put_contents($filename, $type . "\n", FILE_APPEND);

    // set cookie
    setcookie('type', $type);


    // send them back so they can see their result
    header("Location: index.php");
    exit();

?>