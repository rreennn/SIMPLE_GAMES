<?php
    session_start();
    if(!isset($_SESSION["id"])) {
        header("location: login.php");
    } else {
        $conn = mysqli_connect("localhost", "root", "", "simplegames");
        $username = $_SESSION["username"];
        $id = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $id);
        $fetch = mysqli_fetch_assoc($result);
    }
    $pic = $fetch["pic"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Your Profile</title>
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
        function update() {
                Swal.fire({
                    title: 'Are you sure to update your password?',
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
        function upload() {
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
            <li><a href="#">Your Profile</a></li>
            <li><a id="logout" href="javascript:logout()">Logout</a></li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="container">
            <div class="popup-wrapper" id="pop-up">
                <div class="popupPass">
                    <img src="hero/exit.png" alt="" onclick="popDown()">
                    <h2>Change Your Password</h2>
                    <form action="updatePass.php" method="post">
                        <input type="text" name="username" id="username" placeholder="Your Username"><br><br>
                        <input type="password" name="password" id="password" placeholder="Old Password"><br><br>
                        <input type="password" name="new" id="new" placeholder="New Password"><br><br>
                        <input type="submit" name="submit" id="submit" onclick="update()">
                    </form>
                </div>
            </div>
            <div class="popup-wrapper2" id="pop-up2">
                <div class="popupPic">
                    <img src="hero/exit.png" alt="" onclick="popDown2();">
                    <h2>Change Your Profile Pic</h2>
                    <form action="uploadPic.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="profilePic" id="profilePic">
                        <input type="submit" name="submit" id="submit" onclick="upload()">
                    </form>
                </div>
            </div>
            <div class="wrapperProfile">
                <div class="photo">
                    <img src="<?php if($pic == "") {
                        echo "hero/placeholderimg.jpg";
                    } else {
                        echo "hero/" . $pic;
                    }
                        ?>" alt="">
                </div>
                <div class="player">
                    <h1>Username : <?=$_SESSION["username"]?></h1>
                    <h3>Id : <?= $fetch["id"] ?></h3>
                    <h3>Score</h3>
                    <span>
                        <a href="#" onclick="popUp2(); return false" id="change-pic">Change Photo</a>
                        <a href="#" onclick="popUp(); return false" id="change-pass">Change Password</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
        <div class="footer">
            <a href="#">By rreenn56 @ 2023</a>
        </div>
        <script type="text/javascript" src="indexScript.js"></script>
    </body>
</html>