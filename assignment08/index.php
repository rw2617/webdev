<!doctype html>
<html>
    <head>
        <title>Movie Database</title>
        <style>
            a{
                padding: 10px;
                border: 2px solid black;
            }
            body{
                background-color: lavender;
            }
            button{
                color: #551A8B;
            }
        </style>
    </head>
    <body>
        <h1>My Movie Database: View</h1>

        <?php
            include('header.php');
        ?>

        <!-- grab all movies from the database and display to the user -->
        <?php

            // connect to database
            $dbpath = getcwd() . '/database/movies.db';
            $db = new SQLite3($dbpath);


            // set up a SQL query to get all movies from the table
            $sql = "SELECT id, title, year FROM movies";
            $statement = $db->prepare($sql);
            $result = $statement->execute();
        

            // iterate over those movies and generate output
            while ($array = $result->fetchArray()) {
                $id = $array['id'];
                print $array['id'] . ' - ' . $array['title'] . ' - ' . $array['year'] . '
                <form action="delete.php" method="POST">
                    <button type="submit" value='.$id.' name = "id">Delete</button>
                </form>' . '<br>';
            }

            $db->close();
            unset($db);

        ?>

    </body>

</html>