<?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location: ../login.php");
    }
    $conn = mysqli_connect("localhost", "root", "", "simplegames");
    $username = $_SESSION["username"];
    $scr = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $scr);
    $fetch = mysqli_fetch_assoc($result);
    $score = $fetch["score"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Paper Scissors</title>
    <link rel="stylesheet" href="suit.css">
</head>
<body>
    <div class="navbar">
        <ul>
            <li>Hi! <?= $_SESSION["username"] ?></li>
            <li><a href="#">Home</a></li>
            <li><a href="profile.php">Your Profile</a></li>
            <li><a id="logout" href="javascript:logout()">Logout</a></li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="container">
            <div class="img-wrapper">
                <img src="hero/placeholderimg.jpg" alt="" id="img-player">
                <h1>VS</h1>
                <img src="hero/placeholderimg.jpg" alt="" id="img-comp">
            </div>
            <div class="wrap-teros">
                <h1 id="result" data-value="<?php echo $_SESSION['score'] ?>">Score : <?= $_SESSION["score"] ?> </h1>
                <div class="choose-wrap">
                    <div class="my-choose">
                        <h3 id="player-score">You: </h3>
                        <h5 id="player-choose">You Choose : </h5>
                    </div>
                    <div class="comp-choose">
                        <h3 id="comp-score">Computer: </h3>
                        <h5 id="comp-choose">Computer Choose : </h5>
                    </div>
                </div>
                <div class="button-wrap">
                    <button class="button-50 button">Rock</button>
                    <button class="button-50 button">Paper</button>
                    <button class="button-50 button">Scissors</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pop-up">
        <div class="rules">
            <h2>Rock Paper Scissors!</h2>
            <p>You'll get 5 times to play against computer</p>
            <p>If the result is tie, you'll get another chance until theres a different</p> 
            <p>in your score and computers score</p> 
            <button class="button-50" type="button" onclick="close()">START!!</button>
        </div>
    </div>
    <script src="suit.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>