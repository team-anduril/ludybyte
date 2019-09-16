<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>LudyByte | Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:200i,300,400&amp;display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway:200i,300,400&amp;display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/dashboard.css" />
  </head>
  <body>
      <?php session_start(); ?>
    <div class="navbar">
      <h1>LudyByte</h1>
      <h3><a href="logout.php">Logout</a></h3>
    </div>
    <h1 class="text-center">Hello <?php echo $_SESSION['user_name'] ?>!!</h1>
  </body>
</html>
