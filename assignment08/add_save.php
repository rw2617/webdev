<?php
    //grab data from user
    $title = $_POST['title'];
    $year = $_POST['year'];


    // validate the data
    if (!$title) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: add_form.php?error=forgot");
        exit();
    }
    if (!$year) {
        // send them back to the form and tell them
        // to fill it out
        header("Location: add_form.php?error=forgot");
        exit();
    }

    //connect to db
    $dbpath = getcwd() . '/database/movies.db';
    $db = new SQLite3($dbpath);

    //insert record into table
    $sql = "INSERT INTO movies (title, year) VALUES (:title, :year)";
    $statement = $db->prepare($sql);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':year', $year);
    $statement->execute();

    $rows_affected = $db->changes();

    $db->close();
    unset($db);

    //redirect back
    header("Location: add_form.php");
    exit();

?>