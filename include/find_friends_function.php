<?php
include_once('connection.php');

function search_user()
{
    global $conn;

    if (isset($_GET['search-btn'])) {
        $search_query = htmlspecialchars($_GET['search-query']);
        $get_user = "select * from users where user_name like '%$search_query%'";
        $run = mysqli_query($conn, $get_user);
        $users = mysqli_fetch_all($run, MYSQLI_ASSOC);
        $users_count = mysqli_num_rows($run);

       for ($i=0; $i < $users_count; $i++) { 
        
        
        $user_name= $users[$i]['user_name'];
        $user_profile = $users[$i]['user_profile'];
        $user_country = $users[$i]['user_country'];
        $user_gender = $users[$i]['user_gender'];


        echo "
        <div class='card'>
        <img src='../$user_profile' width = 200px;>
        <h1>$user_name</h1>
        <p class = 'title'>$user_country</p>
        <p>$user_gender</p>
        
        <form action='../home.php?user_name=$user_name' method='post'>
        <p><button name = 'add' > chat with $user_name</button></p>
        </form>
        </div>";


    }
       
    }



}
