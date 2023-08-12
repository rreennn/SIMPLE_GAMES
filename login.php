<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
        </ul>
    </div>
    <div class="container">
        <h1>~Simple Games~</h1>
        <h4>Login before you proceed</h4>
        <div class="login">
            <form action="validation.php" method="post">
                <input type="text" name="username" id="username" placeholder="Your Username"><br><br>
                <input type="password" name="password" id="password" placeholder="Your Password"><br><br>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
        <h4>Don't have any account?</h4>
        <h4><a href="register.php">Register Here!</a></h4>
    </div>
    <div class="footer">
        <a href="#">By rreenn56 @ 2023</a>
    </div>
</body>
</html>