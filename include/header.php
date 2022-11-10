<nav class="navbar-brand" href="#">
            <a href="#" class="navbar-brand">
                <?php
                $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email = '$user'";
                $run_user = mysqli_query($conn, $get_user);
                // $row = mysqli_fetch_all($run_user,MYSQLI_ASSOC);
                $row = mysqli_fetch_assoc($run_user);
                $user_name = $row['user_name'];

                echo " <a class='vavbar-brand' href='../home.php?user_name=$user_name'> To My Chat</a>";

                ?>
            </a>
            <ul class="navbar-nav">
                <li><a style="color:red;text-decoration:none;font-size:20px;" href="../account_setting.php">Setting</a></li>
            </ul>

        </nav><br>