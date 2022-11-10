<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>login to your account</title>
</head>

<body>
    <div class="container">

        <div class="signin-form">
            <form action="signin_user.php" method="post">
                <div class="form-header">
                    <h2>Sign In</h2>
                    <p>Login to MyChat</p>
                </div>
                <div class="form-group  ">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="youremail@site.com">

                </div>

                <div class="form-group  ">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="password">

                </div>
                <div class="small">
                    forgot password?
                    <a href="forgot_pass.php">click here</a>

                </div>
                <div class="form-group  ">
                    <button type="submit" class="btn btn-primary btn-blocked btn-lg" name="sing_in">Sign in</button>
                </div>


                <div class="text-center small" style="color: #67428B;">Don't have an account? <a href="signup.php">Create One</a></div>

            </form>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>