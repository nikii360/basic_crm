<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <hr/>

    <h3>MENU</h3>
    <div id="menu">
      <ul>
        <li><a href="add.php" <?php if($_GET['currentPage'] == 'add') echo 'class="active"'; ?>>Add new customer</a></li>
        <li><a href="addtask.php" <?php if($_GET['currentPage'] == 'addtask') echo 'class="active"'; ?>>Add new task</a></li>
        <li><a href="editc.php" <?php if($_GET['currentPage'] == 'editc') echo 'class="active"'; ?>>Edit customer details</a></li>
        <li><a href="editt.php" <?php if($_GET['currentPage'] == 'editt') echo 'class="active"'; ?>>Edit task details</a></li>
        <li><a href="delete.php" <?php if($_GET['currentPage'] == 'delete') echo 'class="active"'; ?>>Delete a customer</a></li>
        <li><a href="deletetask.php" <?php if($_GET['currentPage'] == 'deletetask') echo 'class="active"'; ?>>Delete a task</a></li>

      </ul>
    </div>

  </body>
</html>
