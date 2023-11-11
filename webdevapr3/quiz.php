<!doctype html>
<html>
    <head>
        <title>quiz</title>
        <style>
            #error{
                background-color: 'red';
                color:"white";
                padding: 10px;
                font-size: 150%;
            }
        </style>
    </head>
    <body>
        <h1>quiz</h1>
        <?php
            if($_GET['error'] == 'forgot'){
        ?>
            <div id='error'>you forgot a value</div>

        <?php
            if($_GET['error'] == 'forgot'){
        ?>
        <form>
            favorite color
            <select action="save.php" method="POST" name="color" id="color">
                <option value=''>SELECT A COLOR</option>
                <option value='y'>yellow</option>
                <option value='g'>green</option>
                <option value='b'>blue</option>
            </select>
            <input type='submit'>
        </form>
    </body>
</html>