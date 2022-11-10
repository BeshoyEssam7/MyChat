<?php
include_once "connection.php";
// $conn = mysqli_connect("localhost","root","","mychat") ;
$conn = mysqli_connect("localhost", "root", "", "mychat");
$users = "select * from users";
$run_users = mysqli_query($conn, $users);
$row_users = mysqli_fetch_all($run_users, MYSQLI_ASSOC);

$users_count = mysqli_num_rows($run_users);

// while ($row_users = mysqli_fetch_all($run_users,MYSQLI_ASSOC)) {
//     $user_name = $row_users[$users_count-1]['user_name'];
//     echo $user_name;
// }


for ($i = 0; $i < $users_count; $i++) {
    $user_id = $row_users[$i]['user_id'];
    $user_name = $row_users[$i]['user_name'];
    $user_profile = $row_users[$i]['user_profile'];
    $login = $row_users[$i]['log_in'];
?>
    <?php
    // if($login=='Online'){echo 'Online';}else{echo 'Offline';}
    echo "
    <li>
        <div class='chat-left-img'>
        <img src='$user_profile' width='10px' alt=''>
        </div>
        <div class='chat-left-details'>
         <p><a href='home.php?user_name=$user_name'>$user_name</a></p>
     
        

         </div>
    </li>
    ";
    if ($login == 'Online') {
        echo 'Online';
    } else {
        echo 'Offline';
    }
}

echo "<hr>";

echo $users_count;

// var_dump($row_users);



// }

// $row_count = mysqli_num_rows($row_user);
