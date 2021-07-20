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
      $_GET['currentPage'] ='addtask';
      include_once('menu.php');
      include("config\db2.php");
      session_start();

      if(isset($_POST['new'])&& $_POST['new']==1){
        $date1=$_POST['date1'];
        $idk=0;
        $type=$_REQUEST['type'];
        $desc= $_REQUEST['desc'];
        $notes= $_REQUEST['note'];
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

        $date2=$_REQUEST['date2'];
        $status=$_REQUEST['status'];
        $rep= $_SESSION["ID"];

        $sql= "INSERT INTO `notes`(id,Date,Notes,Is_New_Todo,Todo_Type_ID,Todo_Desc_ID,Todo_Due_Date,Contact,Task_Status,Sales_Rep)
        VALUES('$id','$date1','$notes','$idk','$type','$desc','$date2','$id','$status','$rep')";


        if($conn->query($sql)===TRUE){
          echo "DONE.. ADDED SUCCESSFULLY";

        }else{
        echo "ERROR!!!!".$sql."<br/>".$conn->error;
      }$conn->close();
    }
  ?>



    <h3>ADD TASK</h3>
    <form action="addtask.php" method="post" name="addshit">
    <input type="hidden" name="new" value="1" />
      <label>Enter the date: </label>
      <input type="date" name="date1" class="box">
      <br/>
      <label>Enter note: </label>
      <input type="text" name="note" class="box">
      <br/>
      <label>Enter name of the Customer: </label>
      <input type="text" name="name" class="box">
      <br/>
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
