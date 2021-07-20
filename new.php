<?php
  use phpGrid\C_DataGrid;
  include_once("phpGrid/conf.php");
  include_once('header.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Killer CRM</h1>
    <hr/>
    <?php
      include("config\db_connectivity.php");


      // username and password sent from form

        $gmail="appi.susu@gmail.com";
        $pass= "123456";
        $myusername = mysqli_real_escape_string($db,$gmail);  //for use in sql statements
        $mypassword = mysqli_real_escape_string($db,$pass);

        $sql = "SELECT id as num FROM users WHERE Email = '$myusername' and Password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['num'];
        echo ($active);


        $count = mysqli_num_rows($result);




    ?>

    <?php include_once('footer.php'); ?>
  </body>
</html>
