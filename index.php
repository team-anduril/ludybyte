<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>LudyByte | Login</title>
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:200i,300,400&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/main.css" />
  </head>
  <body>

    <?php 
        session_start();
        if(isset($_SESSION['user_name']) && $_SESSION['user_email']){
            header("Location: dashboard.php");
        }
    ?>

        



    <div class="login-body grid-2">
      <section class="welcome-text">
        <div class="welcome-text-body">
          <h1 class="text-center main-header">Welcome</h1>
          <p>
            Hello friend! Welcome to LudyByte, a social media community for
            developers to share ideas and connect. Login to connect with like
            minds!
          </p>
          <br />
          <p class="text-center">Don't have an account?</p>
          <a class="login-signup-button text-center" href="register.html"
            >SIGN UP</a
          >
        </div>
      </section>
      <section class="with-form">
        <div class="with-form-body">
          <h1 class="second-main-header">Sign in to LudyByte</h1>
          <form action = "" method = "post" name="signin-form">
            <label for="login-email">* Email</label>
            <input
              placeholder="Enter your email"
              type="email"
              id="login-email"
              name="email"
              required
              class="input text-input"
              value='<?php if(isset($_SESSION['temp_email'])){echo $_SESSION['temp_email'];} ?>'
            />

            <label for="login-password">* Password</label>
            <input
              placeholder="Enter your password"
              type="password"
              id="login-password"
              name="password"
              required
              class="input text-input"
              value='<?php if(isset($_SESSION['temp_password'])){echo $_SESSION['temp_password'];} ?>'
            />
            <br />

            <?php

                


                function mres($value)
                {
                    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
                    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

                    return str_replace($search, $replace, $value);
                }

                


                //CONFIRMATION WITH PHP

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if (isset($_POST['email']) && !empty(($_POST['email'])) && isset($_POST['password']) && !empty($_POST['password'])){
                        $user_email = ($_POST['email']);
                        $user_password = md5($_POST['password']);

                        $userjson = file_get_contents("users.json");
                        if ($userjson === false) {
                            // deal with error...
                            echo "no file";
                        }

                        $u_database = json_decode($userjson, true);
                        if ($u_database === null) {
                            // deal with error...
                            echo "json doesn't exist";
                        }

                        $users = $u_database[0];
                        if(array_key_exists($user_email, $users)){
                            if($users[$user_email]['password'] == $user_password){
                                $_SESSION['user_name'] = $users[$user_email]['name'];
                                $_SESSION['user_email'] = $users[$user_email]['email'];
                                header ("Location: dashboard.php");
                            }else{
                                echo "<p class='danger'>Wrong password</p>";
                            }
                        }else{
                            // echo "<script>location.href='index.php' </script>";
                            $_SESSION['temp_email'] = $user_email;
                            $_SESSION['temp_password'] = $_POST['password'];
                            echo '<p> User Not Found. <a id="redirect_to_signup" href="register.php">Sign up?</a></p>';
                        }

                    }else{
                        echo "fill all fields";
                    }
                }

            ?>
            <hr />
            <button type="submit" class="login-login-button">SIGN IN</button>
          </form>
        </div>
      </section>
    </div>

   

    <script src="js/main.js"></script>
  </body>
</html>
