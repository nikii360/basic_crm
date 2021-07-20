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
      $_GET['currentPage'] ='add';
      include_once('menu.php');
      include("config\db2.php");
      session_start();

      if(isset($_POST['new'])&& $_POST['new']==1){
        $id=$_REQUEST['id'];
        $fname=$_REQUEST['fname'];
        $lname=$_REQUEST['lname'];
        $rsource=$_REQUEST['rsource'];
        $date = $_POST['date'];

        $title=$_REQUEST['title'];
        $company=$_REQUEST['company'];
        $industry=$_REQUEST['industry'];
        $address=$_REQUEST['address'];
        $address1=$_REQUEST['address1'];
        $address2=$_REQUEST['address2'];
        $city=$_REQUEST['city'];
        $state=$_REQUEST['state'];
        $zip= $_REQUEST['ZIP'];
        $phone=$_REQUEST['phone'];
        $email=$_REQUEST['mail'];
        $status=$_REQUEST['status'];
        $linkedin=$_REQUEST['linkedin'];
        $site=$_REQUEST['site'];
        $info=$_REQUEST['info'];
        $rating= $_REQUEST['rating'];
        $rep= $_SESSION["ID"];

        $sql= "INSERT INTO `contact`(Contact_First,Contact_Middle,Contact_Last,Lead_Referral_Source,Date_of_Initial_Contact,Title,Company,Industry,Address,Address_Street_1,Address_Street_2,Address_City,Address_State,Address_Zip,Address_Country,Phone,Email,Status,Website,LinkedIn_Profile,Background_Info,Sales_Rep,Rating,Project_Type,Project_Description,Proposal_Due_Date,Budget,Deliverables)
        VALUES('$fname',NULL,'$lname','$rsource','$date','$title','$company','$industry','$address','$address1','$address2','$city','$state','$zip',NULL,'$phone','$email','$status','$site','$linkedin','$info','$rep','$rating',NULL,NULL,NULL,NULL,NULL)";


        if($conn->query($sql)===TRUE){
          echo "New record created successfully";
          header("location: addtask.php");

        }else{
        echo "ERROR!!!!".$sql."<br/>".$conn->error;
      }$conn->close();
    }
  ?>



    <h3>ADD CUSTOMER RECORDS</h3>
    <form action="add.php" method="post" name="addtext">
    <input type="hidden" name="new" value="1" />
      <label>Enter first name: </label>
      <input type="text" name="fname" class="box">
      <br/>
      <label>Enter Last name: </label>
      <input type="text" name="lname" class="box">
      <br/>
      <label>Enter Lead Referral Source: </label>
      <input type="text" name="rsource" class="box">
      <br/>
      <label>Enter date of initial contact: </label>
      <input type="date" name="date" class="box">
      <br/>
      <label>Enter Title: </label>
      <input type="text" name="title" class="box">
      <br/>
      <label>Enter Company: </label>
      <input type="text" name="company" class="box">
      <br/>
      <label>Enter Industry: </label>
      <input type="text" name="industry" class="box">
      <br/>
      <label>Enter Address: </label>
      <input type="text" name="address" class="box">
      <br/>
      <label>Enter Address Street 1: </label>
      <input type="text" name="address1" class="box">
      <br/>
      <label>Enter Address Street 2: </label>
      <input type="text" name="address2" class="box">
      <br/>
      <label>Enter Address city: </label>
      <input type="text" name="city" class="box">
      <br/>
      <label>Enter Address State: </label>
      <input type="text" name="state" class="box">
      <br/>
      <label>Enter ZIP code: </label>
      <input type="number" name="ZIP" class="box">
      <br/>
      <label>Enter phone number:</label>
      <input type="text" name="phone" class="box">
      <br/>
      <label>Enter email id: </label>
      <input type="text" name="mail" class="box">
      <br/>
      <label>Enter status:</label><br/>
      <input type="checkbox" name="status" value=1>Lead</input><br/>
      <input type="checkbox" name="status" value=2>Opportunity</input></br>
      <input type="checkbox" name="status" value=3>Customers won</input></br>
      <label>Enter website:</label>
      <input type="text" name="site" class="box">
      <br/>
      <label>Enter linkedin Profile:</label>
      <input type="text" name="linkedin" class="box">
      <br/>
      <label>Enter background info:</label>
      <input type="text" name="info" class="box">
      <br/>
      <label>Enter Rating(out of 5):</label>
      <input type="number" name="rating" class="box">
      <br/>
      <div class="center">
        <input type="submit" value="submit" name="submit">
      </div>
    </form>
    <?php include_once('footer.php'); ?>
  </body>
</html>
