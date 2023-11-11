<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
        <h1>Form</h1>
        
        <?php
        if ($_GET['error'] == 'none') {
            print "<div>You are logged in!</div>";
        }
        else if ($_GET['error'] == 'incorrect') {
            print "<div>Username and password combination is incorrect!</div>";
        }
        else if ($_GET['error'] == 'username') {
            print "<div>Missing username!</div>";
        }
        else if ($_GET['error'] == 'password') {
            print "<div>Missing password!</div>";
        }
        else if ($_GET['error'] == 'missing') {
            print "<div>Missing username and password!</div>";
        }
        ?>

        <form action="micro06_process.php" method="POST">
            Username:
            <input type="text" id="username" name="username">
            <br>

            Password:
            <input type="password" id="password" name="password">
            <br>

            <input type="submit">
        </form>
	</body>
</html>