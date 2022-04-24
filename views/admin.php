
<?php
/* Check if admin is login  */

if(isAdminLoggedin()){
    header("location: ".URLROOT."Panels/");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>views/style/admin.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>views/style/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Adding Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">


    <title>Admin Login</title>
</head>

<body>
    <div class="box">
        <div class="heading">
            <h2>Admin Login Form</h2>
        </div>
        <div class="inner-box">
            <div class="login-image">
                <img src="<?php echo URLROOT ?>views/images/admin/login.jpg" alt="">
            </div>


            <div class="form-wrapper">
                <form action="<?php echo URLROOT ?>admins/login/" method="POST" onsubmit="return validate();">
                    <div class="form-input-field">
                        <input  autocomplete="off" id="username" name="username" class="user-input" type="text" placeholder="Username" onkeyup="validateUserName(this.value,'username-error')">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span class="error" id="username-error"></span>
                    </div>
                    <div class="form-input-field">
                        <input id="password" name="password" autocomplete="new-password" class="user-input" type="password" onkeyup="validatePassword(this.value,'password-error')" placeholder="Password">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span class="error" id="password-error"></span>
                    </div>
                    <div class="form-tail">

                        <input type="submit" value="LOGIN">

                        <span id="login-error" class="<?php echo ($data['loginError']!=='')?'active':'' ?>"><?php echo $data['loginError']?></span>
              
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="<?php echo URLROOT ?>views/js/admin_ValidateForm.js"></script>
</body>

</html>