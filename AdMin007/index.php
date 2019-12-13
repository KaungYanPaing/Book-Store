<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Philosopher&display=swap" rel="stylesheet"> 
  </head>
  <body>
    <div class="h1">
      Admin Login
    </div>
    <form action="login.php" method="post">
      <label for="username">Username</label>
      <input type="text" name="username" id="name">

      <label for="password">Password</label>
      <input type="password" name="password" id="password">

      <br><br>
      <input type="submit" value="Login" id="submit">
    </form>
  </body>
</html>
