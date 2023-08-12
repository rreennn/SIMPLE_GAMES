<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        $_SESSION["username"] = "";
    }
    if(!isset($_SESSION['score'])) {
        $_SESSION['score'] = 0;
    }
    $currentScore = $_SESSION["score"];
    if(isset($_GET['score'])) {
        $score = $_GET['score'];
        $score = intval($score);
        $conn = mysqli_connect("localhost", "root", "", "simplegames");
        $username = $_SESSION["username"];
        $s = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $s);
        $num = mysqli_num_rows($result);
        if($num > 0) {
            $up = "UPDATE user SET score = $score WHERE username = '$username'";
            mysqli_query($conn, $up);
            $fetch = mysqli_fetch_assoc($result);
            $_SESSION['score'] = $fetch['score'];
            if(mysqli_affected_rows($conn) != -1) {
                header('refresh: 1;');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Game : Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function logout() {
            Swal.fire({
                title: 'Are you sure to proceed logging out?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                location.href = "login.php";
  }
})
                
        }
    </script>
</head>
<body>
    <div class="navbar">
        <ul>
            <li>Hi! <?= $_SESSION["username"] ?></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Your Profile</a></li>
            <li><a id="logout" href="javascript:logout()">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h1>~Simple Games~</h1>
        <h4>Your choice of time killer</h4>
        <div class="wrapper">
            <div class="option1">
                <div class="card">
                <img src="hero/RPS.png" alt=""><br>
                <a href="RPS/suit.php">Rock Paper Scissors!</a>
            </div>
            <div class="card">
                <img src="hero/placeholderimg.jpg" alt=""><br>
                <a href="#">Second Game</a>
            </div>
            </div>
            <div class="option2">
            <div class="card">
                <img src="hero/placeholderimg.jpg" alt=""><br>
                <a href="#">Third Game</a>
            </div>
            <div class="card">
                <img src="hero/placeholderimg.jpg" alt=""><br>
                <a href="#">Fourth Game</a>
            </div>
            </div>
        </div>
        <div class="info">
            <div class="clock" id="clock" onload="currentTime()">
            </div>
            <div class="score">
                <h3>Your Current Score : <?php echo $currentScore?></h3>
                
            </div>
        </div>
    </div>
    <div class="footer">
        <a href="#">By rreenn56 @ 2023</a>
    </div>
    <script type="text/javascript" src="indexScript.js"></script>
</body>
</html>