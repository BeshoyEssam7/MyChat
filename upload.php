<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Change Profile Picture</title>
</head>
<?php session_start();
include_once('include/connection.php');
include_once('include/find_friends_function.php');

?>

<body>

    <?php

    $user = $_SESSION['user_email'];

    $get_user = "select * from users where user_email = '$user'";
    $run_user = mysqli_query($conn, $get_user);
    // $row = mysqli_fetch_all($run_user,MYSQLI_ASSOC);
    $row = mysqli_fetch_assoc($run_user);
    $user_name = $row['user_name'];
    $oldname = $row['user_profile'];

    echo "
        <div class='card container'>
        <img src='$oldname' width = 200px;>
        <h1>$user_name</h1>
       
        
        <form  method='post' enctype='multipart/form-data'>
        <label for=''>Change profile Picture
        <input type='file' name='u_profile'>
        </label>
<button class='btn btn-info' type='submit' name='update_img'>update profile</button>


        </form>
        </div>";
   
    if (isset($_POST['update_img'])) {
    $u_image = $_FILES['u_profile']['name'];
    $tmp_name = $_FILES['u_profile']['tmp_name'];
    $newname="img/".uniqid().$u_image;

if($u_image==""){
    echo" <script>alert('please setect image')</script>";
}else{

    move_uploaded_file($tmp_name,"$newname");

    $updateimgae = "update users set user_profile = '$newname' where user_name = '$user_name'";
    $doUpdate = mysqli_query($conn,$updateimgae);
if($doUpdate){

    echo" <script>alert('profile has been changed ')</script>";
    header("location:account_setting.php");
}}
}

    // echo$newname .'<br>';
    // echo$oldname;

        // if($_FILES){
        //     print_r($_FILES);
        // }
    ?>

</body>

</html>