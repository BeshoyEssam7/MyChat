<?php
include_once "./include/connection.php";

if (isset($_POST['sign_up'])) {
    $name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["user_name"]));
    $pass = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["user_pass"]));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["user_email"]));
    // $country =htmlentities(mysqli_real_escape_string($conn,$_POST["user_country"]));

    $country = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["user_country"]));
    $gender = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["user_gender"]));
    $rand = rand(1, 2);


    if ($name == "") {
        echo "<script> alert('we can not verify your name') </script>";
        echo  "<script>window.open('signup.php','_self')</script>";
        exit();
    }

    if (strlen($pass) < 8) {
        echo "<script> alert('pass should be minmum 8 characters') </script>";
        echo  "<script>window.open('signup.php','_self')</script>";
        exit();
    }

    $check_email = "select * from users where user_email = '$email'";
    $run_email = mysqli_query($conn, $check_email);
    $check = mysqli_num_rows($run_email);
    if ($check == 1) {
        echo "<script> alert('this email is already exist please try again') </script>";
        echo  "<script>window.open('signup.php','_self')</script>";
        exit();
    }

    if ($rand == 1) {
        $profile_pic = "img/profile1.png";
    } elseif ($rand == 2) {
        $profile_pic = "img/profile2.png";
    }


    $insert = "insert into users (user_name,user_pass,user_email,user_profile,user_country,user_gender) 
    values ('$name','$pass','$email','$profile_pic','$country','$gender')";

    $query = mysqli_query($conn,$insert);

    if($query){
        echo "<script> alert('congratulation $name your account has been created successfully') </script>";
        echo "<script> window.open('signin.php', '_self') </script>";

    }
    else{
        echo "<script> alert('Registration Faild, try again!') </script>";
        echo "<script> window.open('signup.php', '_self') </script>";

    }
}
