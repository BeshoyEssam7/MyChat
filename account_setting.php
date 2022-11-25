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
        // $row = mysqli_fetch_all($run_user,MYSQLI_ASSOC);
        $row = mysqli_fetch_assoc($run_user);
        $user_name = $row['user_name'];

        echo " <a class='vavbar-brand' href='home.php?user_name=$user_name'> To My Chat</a>";

        ?>
    </a>
    <!-- <ul class="navbar-nav">
                <li><a style="color:red;text-decoration:none;font-size:20px;" href="../account_setting.php">Setting</a></li>
            </ul> -->

</nav><br>

<body>

    <div class="row">
        <div class="col-ms-2">
            <?php
            $get_user = "select * from users where user_id = '$user_id'";
            $run_user = mysqli_query($conn, $get_user);
            $row = mysqli_fetch_assoc($run_user);


            // $user_id = $row['user_id'];

            $user_name = $row['user_name'];
            $user_pass = $row['user_pass'];
            $user_email = $row['user_email'];
            $user_profile = $row['user_profile'];
            $user_country = $row['user_country'];
            $user_gender = $row['user_gender'];
            ?>
        </div>
        <div class="col-ms-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active">
                            <h2>change account settings</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;"> Change your user name</td>
                        <td><input type="text" name="u_name" class="form-control" required value="<?php
                                                                                                    echo $user_name; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a class="btn btn-default" style="text-decoration:none; font-size:15px " href="upload.php"> change your profile</a> <img src="<?php echo $user_profile ?>" alt="" width="200px"> </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;"> Change your user email</td>
                        <td><input type="email" name="u_email" class="form-control" required value="<?php
                                                                                                    echo $user_email; ?>"></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Country</td>
                        <td>
                            <select name="u_country" class="form-control" id="">
                                <option><?php echo $user_country; ?></option>
                                <option value="USA">USA</option>
                                <option value="Egypt">Egypt</option>
                                <option value="China">China</option>
                                <option value="Russia">Russia</option>

                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-weight:bold">Gender</td>
                        <td>
                            <select name="u_gender" class="form-control" id="">
                                <option><?php echo $user_gender; ?></option>
                                <option value="male">male</option>
                                <option value="female">female</option>


                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="" style="font-weight:bold;"> Forgotten password question</td>
                        <td>
                            <!-- <button type="button" class="btn btn-default">Forgotten Password</button> -->
                            <div>
                                <form action="recovery.php?id=<?php echo $user_id; ?>" method="POST">
                                    <strong>What is your school best friend ?</strong><br>
                                    <textarea name="content" id="" cols="30" rows="3" placeholder="Someone"></textarea>

                                    <!-- <input type="button" value="submit" name="sub" class="btn btn-info"> -->
                                    <button class="btn btn-info" type="submit" name="subT">submit</button>

                                    <pre>Answer the babove question we will ask you this question if you forget your
                                      <br> Password</pre>

                                </form>

                                <?php
                                if (isset($_POST['subT'])) {
                                    $bfn = htmlspecialchars($_POST['content']);
                                    if (empty($bfn)) {
                                        echo "<script>alert('please enter answer')</script>";
                                        header('location:account_setting.php');
                                    } else {
                                        $update_answer = "update users set forgotten_answer = '$bfn' where user_id = '$user_id'";
                                        $run_query = mysqli_query($conn, $update_answer);
                                        echo "<script>alert('Your answer has been updated')</script>";
                                    }
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="change_password.php" class="" style="text-decoration:none; font: size 15px;">change password</a></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td><button type="submit" name="update">Update</button></td>
                    </tr>
                </table>
            </form>
            <?php
            if (isset($_POST['update'])) {
                $new_username = htmlspecialchars($_POST['u_name']);
                $new_useremail = htmlspecialchars($_POST['u_email']);
                $new_usercountry = htmlspecialchars($_POST['u_country']);
                $new_usergender = htmlspecialchars($_POST['u_gender']);

                $query = "select * from users where user_email = '$new_useremail' ";
                $run = mysqli_query($conn, $query);
                $check_email = mysqli_fetch_all($run, MYSQLI_ASSOC);
                // print_r($check_email);
                if ($check_email) {
                    echo " 
<div class='alert alert-danger'> email is already exist </div>

<script>alert('email is already exist')</script>
                    
                    ";
                }else{

                    
                    $update_data = "update users set user_name = '$new_username',user_email='$new_useremail',user_country = '$new_usercountry' , user_gender = '$new_usergender' where user_id = '$user_id'";
                    $do_update = mysqli_query($conn, $update_data);
                    
                }

            }
            ?>
        </div>
    </div>




    





</body>

</html>