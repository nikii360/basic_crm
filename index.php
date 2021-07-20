<?php
  include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body style="background-color:burlywood;">
    <h1 align="center">Killer CRM</h1>
    <hr/>
    <?php
      include("config\db_connectivity.php");
      session_start();
      if($_SERVER["REQUEST_METHOD"] == "POST") {


        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT id as num FROM users WHERE Email = '$email' and Password = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $online = $row['num'];


        $count = mysqli_num_rows($result);


        if($count == 1) {
          $_SESSION['login_user'] = $email;
          $_SESSION["ID"]= $online;

          header("location: tasks.php");
        }else {
          echo "<div class='form'><h3>Email ID or password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
        }
      }
      else{  ?>

        <section class="container grey-text">
          <h3>Login</h3>
            <form class="white" action="index.php" method="post" name="login">
              <label>Enter your email:</label>
              <input type="text" name="email" class="box">
              <br/>
              <label>Enter password:</label>
              <input type="password" name="password" class="box">
              <br/>
              <div class="center">
                <input type="submit" value="submit">
              </div>
            </form>
        </section>
      <?php } ?>

  </body>
</html>
