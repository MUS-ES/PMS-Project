<?php
/* Check if user is loged in  */

if(isLoggedIn()){
    header("location: ".URLROOT."Home");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharmacy-Management-System</title>
  <!-- Font Awesome Library -->
  <link rel="stylesheet" href="<?php echo URLROOT ?>views/style/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="stylesheet" href="<?php echo URLROOT ?>views/style/index.css">
  <link rel="icon" href="<?php echo URLROOT ?>views/images/index/favpng_logo-pharmacy.ico">
</head>
<body>
  <main class="<?php echo $data["mode"] ?>">
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <!-- Start Sign In -->
          <form class="sign-in-form" method="POST" action="users/login" onsubmit="return signInValidation('signin-error');">
            <div class="logo">
              <img src="<?php echo URLROOT ?>views/images/index/bills.png" alt="drug-logo">
              <h4 class="website-welcoming">Pharmacy Management Platform</h4>
            </div>
            <div class="heading">
              <h2>Welcome To Our Website</h2>
              <h6>Not Registered Yet?</h6>
              <a href="#" class="sign">Sign up</a>
            </div>
            <div class="actual-form">

              <div class="inputandlabel">
                <input autocomplete="off" name="email" id="signin-email" onkeyup="validateEmail(this.value,'signin-email-error')" class="input-field" type="text" />
                <label for="name">Email</label>
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signin-email-error"></span>
              </div>

              <div class="inputandlabel">
                <input autocomplete="new-password" name="password" id="signin-password" onkeyup="validatePassword(this.value,'signin-password-error')" class="input-field" type="password" />
                <label for="pass">Password</label>
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signin-password-error"></span>
              </div>
              <span id="signin-error" class="<?php echo ($data['loginError']!=='')?'active':'' ?>"><?php echo $data['loginError']?></span>
              <input autocomplete="off" class="sign-btn" type="submit" value="Sign In" />
              <p class="text">Forgotten your Username or Password? <a href="#"><br>Get Help </a>in Signing In</p>
            </div>
          </form>
          <!-- End Sign In -->
          <!-- Start Sign Up -->
          <form class="sign-up-form"  method="POST"  action="users/register" onsubmit="return signUpValidation();">
            <div class="logo">
              <img src="<?php echo URLROOT ?>views/images/index/bills.png" alt="drug-logo">
              <h4 class="website-welcoming">Pharmacy Management Platform</h4>
            </div>
            <div class="heading">
              <h2>Get Started</h2>
              <h6>Already a Member?</h6>
              <a href="#" class="sign">Sign in</a>
            </div>


            <div class="actual-form">


              <div class="inputandlabel">
                <input autocomplete="off" name="ph_name" id="signup-pharmacy-name" class="input-field" type="text" />
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signup-pharmacy-name-error"></span>
                <label for="name">Pharmacy Name</label>
              </div>
              <div class="inputandlabel">
                <input autocomplete="off" name="licence" id="signup-licence" class="input-field" type="text" />
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signup-licence-error"></span>
                <label for="name">Licence ID</label>
              </div>
              <div class="inputandlabel">
                <input autocomplete="off" name="fullname" id="signup-fullname" onkeyup="validateFullName(this.value,'signup-fullname-error')" class="input-field" type="text" />
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signup-fullname-error"></span>
                <label for="name">Full Name</label>
              </div>

              <div class="inputandlabel">
                <input autocomplete="off" name="email" id="signup-email" class="input-field" type="text" onkeyup="validateEmailAndAvailability(this.value,'signup-email-error');" />
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signup-email-error"></span>
                <label for="name">Email</label>
              </div>

              <div class="inputandlabel">
                <input autocomplete="new-password" name="password" id="signup-password" onkeyup="validatePassword(this.value,'signup-password-error')" class="input-field" type="password" />
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signup-password-error"></span>
                <label for="pass">Password</label>
              </div>

              <div class="inputandlabel">
                <input autocomplete="off" id="signup-confirm-password" name="confirmPassword" onkeyup="validateConfirmPassword(this.value,'signup-confirm-password-error','signup-password')" class="input-field" type="password" />
                <i class="fa-solid fa-circle-exclamation"></i>
                <span class="error" id="signup-confirm-password-error"></span>
                <label for="pass">Confirm-Password</label>
              </div>


              <input autocomplete="off" class="sign-btn" type="submit" value="Sign Up" />
              <p class="text">By Signing-Up, I agree to the
                <a href="#"><br>Terms of Services</a>
                and <a href="#">Privacy Policy </a>
                <input autocomplete="off" id="signup-check" class="chkbox" type="checkbox">
              </p>

            </div>
          </form>
          <!-- End Sign Up -->
        </div>

        <div class="carousel">
          <div class="image-holder">
            <img class="drugs-background" src="<?php echo URLROOT ?>views/images/index/background.png" alt="drugs-img">
            <img id="pharmacy-img" src="<?php echo URLROOT ?>views/images/index/pharmacy-img.png" alt="pharmacy-img">
          </div>
          <div class="text-holder">
          <h2>Feel Free to Manage Your Pharmacy...</h2>
          </div>
        </div>
      </div>
    </div>
  </main>



  <!--javascript file -->
  <script src="<?php echo URLROOT ?>views/js/index.js"></script>
  <script src="<?php echo URLROOT ?>views/js/validateForm.js"></script>
</body>

</html>