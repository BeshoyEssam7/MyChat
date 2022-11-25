<?php
session_start();
include_once "include/connection.php";

if(isset($_POST['sing_in'])){

    $email= htmlspecialchars(mysqli_real_escape_string($conn,$_POST["email"]));
    $pass= htmlspecialchars(mysqli_real_escape_string($conn,$_POST["pass"]));

    $select_user = "select * from users where user_email = '$email' and user_pass = '$pass'";
    $query = mysqli_query($conn,$select_user);


    $user_data = mysqli_fetch_all($query,MYSQLI_ASSOC);
    $_SESSION['user_id']=$user_data[0]['user_id'];













    $check_user= mysqli_num_rows($query);
    if($check_user==1){
        $_SESSION['user_email']=$email;
     
        $update_msg= mysqli_query($conn,"UPDATE users  set log_in = 'Online' where user_email = '$email'");
        
        $user = $_SESSION['user_email'];
      
      
        // $get_user = mysqli_fetch_all($query,MYSQLI_ASSOC);
        // $get_user=mysqli_fetch_array($query);
        $get_user=mysqli_fetch_assoc($query);

        // $user_name=$get_user["user_name"];





        echo  "<script> window.open('home.php','_self')</script>";



    }
    else{
        echo "<script>alert('pleas check your email and pass')</script>";
        echo  "<script> window.open('signin.php','_self')</script>";

    }







}
?>