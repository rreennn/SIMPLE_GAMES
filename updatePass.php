<?php
    $conn = mysqli_connect("localhost", "root", "", "simplegames");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $new = $_POST["new"];
    $s = "SELECT * FROM user WHERE username = '$username' && password = '$password'";
    $result = mysqli_query($conn, $s);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $upd = "UPDATE user SET password = '$new'";
        mysqli_query($conn, $upd);
        header("location: login.php");
    }
?>