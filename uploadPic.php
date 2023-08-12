<?php
    session_start();
    $username = $_SESSION["username"];
    $id = $_SESSION['id'];
    $imgfile = $_FILES["profilePic"]["name"];
        $tempfile = $_FILES["profilePic"]["name"];
        $target_dir = "hero/";
        $target_file = $target_dir . basename($imgfile);
        $upload_ok = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["profilePic"]["tmp_name"]);
        if($check !== false) {
            echo "\n\nur image is ready! this " . $check["mime"];
            $upload_ok = 1;
        } else {
            echo "\n\nu need to upload image dummy..";
            $upload_ok = 0;
        }
        
        if (file_exists($target_file)) {
            echo "\n\ni've found the same img in the directory, can you change it?";
            $upload_ok = 0;
        }
        
        if ($_FILES["profilePic"]["size"] > 1000000) {
            echo "\n\nthe img too big, compress it pls";
            $upload_ok = 0;
        }
        
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "\n\nwe only accept jpg, png, jpeg, and gif my liege";
            $upload_ok = 0;
        }
        
        if ($upload_ok == 0) {
            echo "\n\ndamn i can't put ur img in here, try again lol";
        } else {
            if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
                echo "\n\nYour img has been uploaded";
            }
            var_dump($id);
            $conn = mysqli_connect("localhost", "root", "", "simplegames");
                $query = "UPDATE user SET pic = '$imgfile' WHERE username = '$username'";
                mysqli_query($conn,$query);
                header('location: profile.php');
        }
?>