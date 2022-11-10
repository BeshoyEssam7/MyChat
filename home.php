<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login to your account</title>
</head>
<?php session_start();
include_once('include/connection.php'); ?>
<?php  if(isset($_SESSION['user_email'])) {?>
<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group-btn searchbox">
                    <div class="input-group-btn">
                        <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a></center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php
                         include_once("include/get_users_data.php"); ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- getting the user information who is logged in  -->
                    <?php
                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users WHERE user_email = '$user'";
                    $run_user = mysqli_query($conn, $get_user);
                    $row = mysqli_fetch_array($run_user);
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];


                    ?>

                    <!-- getting the user data on which user click -->
                    <?php
                    if (isset($_GET['user_name'])) {

                        // global $conn;
                        $get_username = $_GET['user_name'];
                        $get_user = "select * from users where user_name = '$get_username'";
                        $run_user = mysqli_query($conn, $get_user);
                        $row_user = mysqli_fetch_all($run_user,MYSQLI_ASSOC);
                        // print_r($row_user);
                         $username = $row_user[0]['user_name'];
                        $user_profile_image = $row_user[0]['user_profile'];
                        // echo $username;
                        // echo $user_name;  
                        $total_messages = "select * from users_chat where (sender_username = '$username' and receiver_username = '$user_name')
                        OR (receiver_username = '$username' and sender_username = '$user_name')";
                        $run_messages = mysqli_query($conn, $total_messages);
                        $total = mysqli_num_rows($run_messages);
                        echo $total;
                    }

                    ?>
                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src="<?php echo $user_profile_image; ?>" width="20px" alt="">
                        </div>
                        <div class="right-header=detail">
                            <form method="post">
                                <p><?php if(isset($username)){ echo $username;} ?></p>
                                <?php if(isset($total)){ echo  " 
                                    <span><?php  echo $total;?> messages</span> &nbsp; &nbsp;
                                    
                                    "  ;}?>
                                <button name="logout" class="btn btn-danger">LogOut</button>
                            </form>
                            <?php
                            if (isset($_POST['logout'])) {
                                $update_msg = mysqli_query($conn, "update users set log_in = 'Offline' where user_name = '$user_name' ");
                                header("location:logout.php");
                                exit();
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                        <?php
                        if(isset($username)){
                        $sel_msg = "select * from users_chat where (sender_username = '$user_name' and receiver_username = '$username') or 
                        (sender_username = '$username' and receiver_username = '$user_name') order by 1 ASC";
                        $run_msg = mysqli_query($conn, "$sel_msg");

                        while ($row = mysqli_fetch_array($run_msg)) {
                            $sender_username = $row['sender_username'];
                            $receiver_username = $row['receiver_username'];
                            $msg_content = $row['msg_content'];
                            $msg_date = $row['msg_date'];


                        ?>
                            <ul>
                                <?php
                                if ($user_name == $sender_username and $username == $receiver_username) {

                                    echo "
                                <li>
                                <div class= 'rightside-chat'>
                                <span>$user_name <small>$msg_date</small></span>
                                <p>$msg_content</p>
                                </div>
                                </li>
                                ";
                                } else if ($user_name == $receiver_username and $username == $sender_username) {

                                    echo "
                                <li> 
                                <div class= 'leftside-chat text-center'>
                                <span>$username <small>$msg_date</small></span>
                                <p>$msg_content</p>
                                </div>
                                </li>
                                ";
                                }
                                ?>
                            </ul>
                        <?php } }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">

                        <form method="post">
                            <input type="text" name="msg_content" autocomplete="off" placeholder="Write your message here .........">
                            <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i> send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 
if(isset($_POST['submit'])){
    $msg = htmlspecialchars($_POST['msg_content']);
    if($msg==''){
       echo " 
       
       <div class='alert alert-danger'>
       <strong><center>Message was unable to send</center></strong>
       </div>
       ";
    }else if(strlen( $msg)>100){
        echo " 
       
        <div class='alert alert-danger'>
        <strong><center>Message was too long must be less than 100 charcters</center></strong>
        </div>
        ";
    }else{
        

        $insert = "insert into users_chat  (sender_username,receiver_username,msg_content,msg_status,msg_date)Values('$user_name','$username','$msg','unread', NOW())";
        $run_insert = mysqli_query($conn,"$insert");
        
    
              // header("location:home.php");
    
    }
    
}
?>

</body>
<?php } else{header("location:signin.php");}?>
</html>