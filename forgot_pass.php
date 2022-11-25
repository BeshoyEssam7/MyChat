<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Forgot password</title>
</head>

<body>
    <div class="container">

        <div class="signin-form">
            <form action="handleForgortPass.php" method="post">
                <div class="form-header">
                    <h2>Forgot password</h2>
                    <p>MyChat</p>
                </div>

<?php 
session_start();
                if(isset($_SESSION['pass_changed'])){
                    echo" <script>alert('password changed ')</script>";

}
?>
                <div class="form-group  ">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="youremail@site.com">

                </div>

                <div class="form-group  ">
                    <label for="">Best friend name</label>
                    <input type="text" class="form-control" name="bfn" placeholder="Best friend name">

                </div>
               
                <div class="form-group mt-3 ">
                    <button type="submit" class="btn btn-primary btn-blocked btn-lg" name="submit">Submit</button>
                </div>


                <div class="text-center small" style="color: #67428B;">Back to sign in <a href="signin.php">Click here</a></div>

            </form>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>