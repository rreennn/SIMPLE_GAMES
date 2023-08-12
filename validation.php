<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "simplegames");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $s = "SELECT * FROM user WHERE username = '$username' && password = '$password'";

    $result = mysqli_query($conn, $s);
    $fetch = mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $_SESSION["username"] = $fetch['username'];
        $_SESSION["id"] = $fetch['id'];
        $_SESSION["profilePic"] = $fetch['pic'];
        $_SESSION["score"] = $fetch['score'];
        header("location: index.php");
    } else {
        echo "<h4> Sorry, we can't find the matched account. </h4>";
        header("location: login.php");
    }
    // $id = "SELECT id FROM user WHERE username = '$username' && password = '$password'";
    // $getId = mysqli_query($conn, $id);
    // $gotId = mysqli_fetch_assoc($getId);
    // // $pic = "SELECT pic FROM user WHERE username = '$username' && password = '$password'";
    // $getPic = mysqli_query($conn, $pic);
    // $gotPic = mysqli_fetch_assoc($getPic);
    // // $score = "SELECT score FROM user WHERE username = '$username' && password = '$password'";
    // $getScore = mysqli_query($conn, $score);
    // $gotScore = mysqli_fetch_assoc($getScore);
?>