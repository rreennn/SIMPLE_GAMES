<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    <div class="container">
        <h1>~Simple Games~</h1>
        <h4>Make a new account</h4>
        <div class="login">
            <form action="registration.php" method="post">
                <input type="text" name="username" id="username" placeholder="Your Username"><br><br>
                <input type="password" name="password" id="password" placeholder="Your Password"><br><br>
                <input type="submit" name="submit" id="submit">
            </form>
        </div>
        <h4>Please remember your own password</h4>
    </div>
    <div class="footer">
        <a href="#">By rreenn56 @ 2023</a>
    </div>
</body>
</html>