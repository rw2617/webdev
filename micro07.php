<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
        <h1>Form</h1>

        <?php

            if ($_COOKIE['log']) {
                print "<div>You are logged in!</div>";
            }
            else{

                if ($_GET['error'] == 'unsuccessful') {
                    print "<div>Username and password combination is incorrect!</div>";
                }
                else if ($_GET['error'] == 'missing') {
                    print "<div>Missing username or password!</div>";
                }

                print '<form action="micro07_process.php" method="POST">
                    Username:
                    <input type="text" id="username" name="username">
                    <br>

                    Password:
                    <input type="password" id="password" name="password">
                    <br>

                    <input type="submit">
                </form>';
            }
        ?>
	</body>
</html>