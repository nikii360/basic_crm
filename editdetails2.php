<?php
  include("header.php");
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
      $_GET['currentPage'] ='editdetails1';
      include_once('menu.php');
      include("config\db2.php");
      session_start();

      if(isset($_POST['new'])&& $_POST['new']==1){
        $id=$_SESSION["edits2"];
        $type=$_REQUEST['type'];
        $date = $_POST['date2'];

        $desc=$_REQUEST['desc'];
        $status=$_REQUEST['status'];

        $sql= "UPDATE notes SET Todo_Type_ID='$type' , Todo_Due_Date='$date' , Todo_Desc_ID='$desc', Task_Status='$status' WHERE id='$id'";

        if($conn->query($sql)===TRUE){
          echo "Task details edited successfully";

        }else{
        echo "ERROR!!!!".$sql."<br/>".$conn->error;
      }$conn->close();
    }
  ?>



    <h3>EDIT TASK DETAILS</h3>
    <form action="editdetails2.php" method="post" name="edits2">
    <input type="hidden" name="new" value="1" />
      <label>Enter type: </label><br/>
      <input type="checkbox" name="type" value=1>Task</input><br/>
      <input type="checkbox" name="type" value=2>Meeting</input><br/>
      <br/>
      <label>Enter task description: </label><br/>
      <input type="checkbox" name="desc" value=1>Follow up by email</input><br/>
      <input type="checkbox" name="desc" value=2>Phone call</input><br/>
      <input type="checkbox" name="desc" value=3>Lunch Meeting</input><br/>
      <input type="checkbox" name="desc" value=4>Tech Demo</input><br/>
      <input type="checkbox" name="desc" value=5>Meetup</input><br/>
      <input type="checkbox" name="desc" value=6>Conference</input><br/>
      <input type="checkbox" name="desc" value=7>Others</input><br/>
      <br/>
      <label>Enter Due Date: </label>
      <input type="date" name="date2" class="box">
      <br/>
      <label>Enter Task Status: </label><br/>
      <input type="checkbox" name="status" value=1>Pending</input><br/>
      <input type="checkbox" name="status" value=2>Completed</input><br/>
      <br/>
      <div class="center">
        <input type="submit" value="submit" name="submit">
      </div>
    </form>
    <?php include_once('footer.php'); ?>
  </body>
</html>
