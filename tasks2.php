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
      $_GET['currentPage']="tasks";
      include_once('menu.php'); ?>

    <h3>My Current Tasks | <a href="tasks2.php">My Completed Tasks</a></h3>

    <?php
      $id= $_SESSION["ID"];
      $dg = new \C_DataGrid("SELECT ID, `Date`, Contact, Todo_Type_ID, Todo_Desc_ID, Task_Status, Task_Update, Sales_Rep, Todo_Due_Date FROM notes", "ID", "notes");
      $dg->set_query_filter(" Sales_Rep = $id && Task_Status = 2");

      $dg->set_col_hidden('ID')->set_col_hidden('Sales_Rep', false)->set_caption('Completed');

      $dg->set_col_title('Todo_Type_ID', 'Type');
      $dg->set_col_title('Todo_Desc_ID', 'Description');
      $dg->set_col_title('Todo_Due_Date', 'Due Date');

      $dg->set_col_edittype('Task_Status', 'select', 'SELECT ID, status FROM task_status');
      $dg->set_col_edittype('Contact', 'select', 'SELECT ID, Contact_Last FROM contact');
      $dg->set_col_edittype('Todo_Type_ID', 'select', 'SELECT ID, type FROM todo_type');
      $dg->set_col_edittype('Todo_Desc_ID', 'select', 'SELECT ID, description FROM todo_desc');

      $dg -> display();
    ?>

    <?php include_once('footer.php'); ?>
  </body>
</html>
