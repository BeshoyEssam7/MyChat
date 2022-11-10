<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create New Account</title>
</head>
<?php include_once('signup_user.php')?>
<body>
    <div class="container">

        <div class="signup-form">
            <form action="signup_user.php" method="post">
                <div class="form-header">
                    <h2>Sign Up</h2>
                    <p>Fill out this form and start chating with your friends.</p>
                </div>
                <div class="form-group  ">
                    <label for="">User Name</label>
                    <input type="text" class="form-control" name="user_name" placeholder="your name">

                </div>
                <div class="form-group  ">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="user_pass" placeholder="password">

                </div>
                <div class="form-group  ">
                    <label for="">Email Address</label>
                    <input type="email" class="form-control" name="user_email" placeholder="youremail@site.com">

                </div>
                <div class="form-group  ">
                    <label for="">Country</label>
                    <select name="user_country" class="form-control" id="">
                        <option value=""disabled >Select a Country</option>
                        <option value="Egypt">Egypt</option>
                        <option value="USA">USA</option>
                        <option value="India">India</option>
                        <option value="China">China</option>
                        <option value="Canada">Canada</option>


                        
                    </select>

                </div>

                <div class="form-group  ">
                    <label for="">Gender</label>
                    <select name="user_gender" class="form-control"  id="">
                        <option value=""disabled >Select your gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    


                        
                    </select>

                </div>
              
                <div class="form-group  ">

                <label for="" class="checkbox=inline" ><input type="checkbox">  I accecpt the <a href="#" >Terms of use</a> & <a href="#">Privacy policy</a></label>
                </div>
                 
                <div class="form-group  ">
                    <button type="submit" class="btn btn-primary btn-blocked btn-lg" name="sign_up">Sign Up</button>
                </div>


                <div class="text-center small" style="color: #67428B;">Don't have an account? <a href="signup.php">Create One</a></div>

            </form>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>