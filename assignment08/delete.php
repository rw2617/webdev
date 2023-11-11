<?php
    $id = $_POST['id'];

    print $id;

    if (!isset($id)) {
        header("Location: index.php");
        exit();
    }

    //connect to db
    $dbpath = getcwd() . '/database/movies.db';
    $db = new SQLite3($dbpath);

    
    $sql = "DELETE FROM movies WHERE id = '$id'";

    $statement = $db->prepare($sql);

    $result = $statement->execute();

    $db->close();
    unset($db);

    //back to index
    header("Location: index.php");
    exit();
?>