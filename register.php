<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LudyByte | Signup</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200i,300,400&amp;display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles/main.css" />
</head>
<body>
    <?php session_start();
        if(isset($_SESSION['user_name']) && $_SESSION['user_email']){
            header("Location: dashboard.php");
        }
    ?>
  <div class="signup-body register-grid">
    <section class="register-text">
     <div class="register-text-body">
        <h1 class="text-center main-register-header">Hi, new LudyByter</h1>
        <p id="signup-intro">Enter your details to create a free account and begin your journey as a LudyByter</p>
        <p>Already have an account?</p>
        <a class="signup-login-button text-center" href="index.php">SIGN IN</a>
     </div>
    </section>
    <section class="register-form">
      <div class="register-form-body">
        <h1 class="second-main-header">JOIN LUDYBYTE</h1>
        <p class="blow-off-steam">A community of developers, by develoers. <br />
          LudyByte gives you a platform to share your ideas <br />
          while also blowing off steam.
        </p>
        <form action="registernew.php" method="post">
          <label for="signup-name">* Name</label>
          <input placeholder="Enter your name" type="text" id="signup-name" name="name" required class="input text-input" />
        
          <label for="signup-email">* Email</label>
          <input placeholder="Enter your email" type="email" id="signup-email" name="email" required class="input text-input" value='<?php if(isset($_SESSION['temp_email'])){echo $_SESSION['temp_email'];} ?>' />
        
          <label for="signup-password">* Password</label>
          <input placeholder="Enter your password" type="password" id="signup-password" name="password" required value='<?php if(isset($_SESSION['temp_password'])){echo $_SESSION['temp_password'];} ?>'
            class="input text-input" />
        
          <button class="signup-signup-button">JOIN LUDYBYTE</button>
          <?php 
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "invalidusername")){
                echo "<script>alert('Username already exists')</script>";
            }    
          session_destroy(); ?>
        
        </form>
      </div>
    </section>
  </div>
</body>
</html>
