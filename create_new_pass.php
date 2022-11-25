<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>create new password</title>
</head>

<body>
    <?php session_start();
    include_once "include/connection.php"; ?>

    <form action="" method="POST">
        <label for="">New Password</label> <input type="password" name="new_pass"> <br><br>
        <label for="">Confirm Password</label> <input type="password" name="confirm_pass">
        <button type="submit" name="create_pass">Create new password</button>

    </form>

    <?php
    if (isset($_POST['create_pass'])) {
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
        $user_email = $_SESSION['user_email'];
        $error = [];

        if (empty($new_pass) || empty($confirm_pass)) {
            $error[] = "password is required";
        }
        if (strlen($new_pass) < 8) {

            $error[] = "password must be more then 8 characters";
        }
        if ($new_pass != $confirm_pass) {
            $error[] = "password not match with confirmation pass";
        }

        if (empty($error)) {
            $query = "update users set user_pass = '$new_pass' where user_email = '$user_email'";
            $run_query = mysqli_query($conn, $query);
            $_SESSION['New_pass_created']='new password created';
            header("location:signin.php");
        } else {
            foreach ($error as $value){
               echo" <div class = 'alert alert-danger' >
               echo $value;
               </div>";
            }
        }
    }
    ?>


</body>

</html>