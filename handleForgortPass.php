<?php
session_start();
include_once "include/connection.php";

if (isset($_POST['submit'])) {

    $user_email = htmlspecialchars($_POST['email']);
    $user_answer = htmlspecialchars($_POST['bfn']);

    $query = "select forgotten_answer from users where user_email = '$user_email'";
    $run = mysqli_query($conn, $query);
    $forgotten_answer = mysqli_fetch_assoc($run);

    if (isset($forgotten_answer)) {
        if ($user_answer == $forgotten_answer['forgotten_answer'] && $user_email != "" && !empty($user_answer)) {
            $query = "update users set user_pass = '123456789'";
            $update = mysqli_query($conn, $query);

            $_SESSION['user_email'] = $user_email;
            header('location:create_new_pass.php');
            // print_r($_SESSION['user_email']);
        } else {
            echo "answer not verify
       <a href='forgot_pass.php'>try again</a> or <a href='signup.php'>create new account</a>";
        }
    }else {
        echo "answer not verify
   <a href='forgot_pass.php'>try again</a> or <a href='signup.php'>create new account</a>";
    }
}
