<!doctype html>

<html>
    <head>
        <title>movie database</title>
        <style>
            #error {
                background-color: red;
                color: white;
                padding: 10px;
                font-size: 100%;
            }
            a{
                padding: 10px;
                border: 2px solid black;
            }
            body{
                background-color: lavender;
            }
            #submit{
                color: #551A8B;
            }
        </style>
    </head>
    <body>
        <h1>My Movie Database: Add</h1>

        <?php
            include('header.php');
        ?>

        <?php
            if ($_GET['error'] == 'forgot') {
        ?>
            </br>
            <div id="error">Please fill out all fields.</div>
            </br>

        <?php
            }
        ?>

        <form action="add_save.php" method="POST">
            Title: <input type="text" name="title"></br>
            Year: <input type="text" name="year"></br>
            </br><input id="submit" type="submit" value="Add Movie">
        </form>

    </body>
</html>