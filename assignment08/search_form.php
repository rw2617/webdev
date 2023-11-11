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
        <h1>My Movie Database: Search</h1>

        <?php
            include('header.php');
        ?>

        <?php
            if ($_GET['error'] == 'forgot') {
        ?>
            <div id="error">Please fill out the field.</div>
            </br>

        <?php
            }
        ?>

        <form action="search.php" method="POST">
            Search for: <input type="text" name="search"></br>
            </br><input id="submit" type="submit" value="Search">
        </form>


        <?php
            $search = $_GET['search'];
            
            if ($search) {
        ?>
            </br>
            <div id="matching">Entries matching your search:</div>
            </br>

        <?php
                //connect to db
                $dbpath = getcwd() . '/database/movies.db';
                $db = new SQLite3($dbpath);
                
                $statement = $db->prepare("select * from movies where title like '%$search%' or year like '%$search%'");
                $result = $statement->execute();
        
                while ($array = $result->fetchArray()) {
                    print $array['id'] . ' - ' . $array['title'] . ' - ' . $array['year'] . '</br>';
                }
        
                $db->close();
                unset($db);
            }
        ?>


    </body>
</html>