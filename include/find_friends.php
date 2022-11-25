<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Search for friends</title>
</head>
<?php session_start();
include_once('connection.php');
include_once('find_friends_function.php');
if (!isset($_SESSION['user_email'])) {
    header('location:singin.php');
} else {
?>

    <body>
    <?php include_once('header.php') ?>
        <div class="row">
            <div class="col-ms-4">

            </div>
            <div class="col-ms-4">
                <form class="search-form" action="">
                    <input type="text" name="search-query" placeholder="Search Friends" id="" required>
                    <button class="btn btn-info" type="submit" name="search-btn">Search</button>
                </form>
            </div>
            <div class="col-ms-4">

            </div>
        </div><br><br>

        <?php 
        $friends_query = 'select * from users';
        $run_friends = mysqli_query($conn,$friends_query);
        $all_friends = mysqli_fetch_all($run_friends,MYSQLI_ASSOC);
        // print_r($all_friends);
        ?>

        <?php search_user(); ?>
    </body>
<?php } ?>

</html>