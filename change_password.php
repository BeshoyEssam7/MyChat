<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Account Setting</title>
</head>
<?php session_start();
include_once('include/connection.php');
include_once('include/find_friends_function.php');


// $user = $_SESSION['user_email'];

?>
<nav class="navbar-brand" href="#">
    <a href="#" class="navbar-brand">
        <?php


        $user = $_SESSION['user_email'];
        $user_id = $_SESSION['user_id'];

        $get_user = "select * from users where user_id = '$user_id'";
        $run_user = mysqli_query($conn, $get_user);

        $row = mysqli_fetch_assoc($run_user);
        $user_name = $row['user_name'];

        echo " <a class='vavbar-brand' href='home.php?user_name=$user_name'> To My Chat</a>";



        ?>

        <form action="" method="POST">
            <label for="">Current Password</label> <input type="password" name="current_pass"> <br><br>
            <label for="">New Password</label> <input type="password" name="new_pass">
            <button type="submit" name="update_pass">Update Password</button>

        </form>
    </a>

    <body>
        <?php
        if (isset($_POST['update_pass'])) {
            $current_pass = htmlspecialchars($_POST['current_pass']);
            $new_pass = htmlspecialchars($_POST['new_pass']);

            $error = [];
            if ($current_pass == "" or $new_pass == "") {
                $error[] = 'password required';
            }
            if ($current_pass != $row['user_pass']) {
                $error[] = 'please check old pass';
            }
            if (strlen($new_pass) < 8) {
                $error[] = 'password is less than 8 characters';
            }




            if (empty($error)) {



                $query = "update users set user_pass = '$new_pass' where user_id = '$user_id'";
                $update_pass = mysqli_query($conn, $query);
                echo " <script>alert('passwoed changed ')</script>";
                // echo" <script> window.open('signin.php')</script>";
                header("location:signin.php");

                $_SESSION['pass_changed'] = 'password changed succesfully';
                print_r($_SESSION['pass_changed']);
            }
            else{

                // print_r($error);
             foreach ($error as $value){
                echo" 
                <div class='alert alert-danger'>
                $value <br>


                           </div>";
             }
            }
        }
        //  else {
        //     $error[] = 'plz check your pass';
        // }



        ?>

</nav><br>








</body>

</html>