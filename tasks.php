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
      $_GET['currentPage'] = 'tasks';
      include_once('menu.php');
    ?>

    <h3>My Current Tasks | <a href="tasks2.php">My Completed Tasks</a></h3>

    <?php
      $id= $_SESSION["ID"];
      $dg = new \C_DataGrid("SELECT ID, `Date`, contact, todo_type_id, todo_desc_id, task_status, Task_Update, sales_rep, todo_due_date FROM notes", "ID", "notes");
      $dg->set_query_filter(" sales_rep = $id && task_status != 2");

      $dg->set_col_hidden('ID')->set_col_hidden('sales_rep', false)->set_caption('Current');

      $dg->set_col_title('todo_type_id', 'Type');
      $dg->set_col_title('todo_desc_id', 'Description');
      $dg->set_col_title('todo_due_date', 'Due Date');

      $dg->set_col_edittype('task_status', 'select', 'SELECT ID, status FROM task_status');
      $dg->set_col_edittype('contact', 'select', 'SELECT ID, Contact_First FROM contact');
      $dg->set_col_edittype('todo_type_id', 'select', 'SELECT ID, Type FROM todo_type');
      $dg->set_col_edittype('todo_desc_id', 'select', 'SELECT ID, Description FROM todo_desc');

      $dg->add_column("actions", array('name'=>'actions','index'=>'actions','width'=>'70','formatter'=>'actions','formatoptions'=>array('keys'=>true, 'editbutton'=>true, 'delbutton'=>false)),'Actions');

      $dg->set_col_readonly('Date, contact, todo_type_id, todo_desc_id, sales_rep, todo_due_date');

      $dg->enable_edit('INLINE');
      $dg -> display();
    ?>

    <?php include_once('footer.php'); ?>
  </body>
</html>
