<?php
session_start();
    $conn = mysqli_connect("localhost", "root", "", "simplegames");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $s = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $s);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        echo "<h4> Sorry, there's something wrong. Please try again. </h4>";
        header("location: register.php");
    } else {
        $ins = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $ins);
        header("location: login.php");
    }
?>