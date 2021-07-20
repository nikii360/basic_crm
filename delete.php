<?php
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
    $_GET['currentPage'] ='delete';
    include_once('menu.php');
    include("config\db2.php");
    session_start();

    if(isset($_POST['new'])&& $_POST['new']==1){
      $name=$_REQUEST['name'];
      $idea = "SELECT * FROM contact WHERE Contact_First = '$name'";
      $result= $conn->query($idea);

      if ($result->num_rows > 0) {
        while($row= $result->fetch_assoc()){
          $id=$row["id"];
        }
      }else{
        echo $idea."<br/>".$conn->error;
      }

      $sql1= "DELETE FROM notes WHERE id = '$id'";
      if ($conn->query($sql1)) {
        echo "DELETED....<br/>";
      }

      $sql2= "DELETE FROM contact WHERE id = '$id'";
      if ($conn->query($sql2)) {
        echo "Customer records Deleted successfully";
      }else {
        echo "Error deleting record: " . $conn->error;
      }$conn->close();
    }


  ?>

    <h3>DELETE CUSTOMER RECORDS</h3>
    <form action="delete.php" method="post" name="deleteshit">
    <input type="hidden" name="new" value="1" />
      <label>Enter the first name of customer: </label>
      <input type="text" name="name" class="box">
      <br/>
      <div class="center">
        <input type="submit" value="submit" name="submit">
      </div>
    </form>

    <?php include_once('footer.php'); ?>

  </body>
</html>
