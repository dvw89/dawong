<?php
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
    </head>
    <body>

        <h1> OtterMart - Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"/> <br />
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="submitForm" value="Login!" />
            
        </form>

        <br>
        <?php
            if (isset($_SESSION['invalid']) && $_SESSION['invalid'] == true) {
                echo "Wrong username or password! <br>";
            }
        
        ?>

    </body>
</html>