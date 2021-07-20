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
      $_GET['currentPage'] = 'Opportunities';
      include_once('menu.php'); ?>

    <h3>Oppurtunities</h3>


    <?php
      $id= $_SESSION["ID"];
      $dg = new \C_DataGrid("SELECT * FROM contact", "id", "contact");
      $dg->set_query_filter(" Status = 2 && sales_rep = $id ");

      $sdg = new \C_DataGrid("SELECT * FROM notes", "id", "notes");
      $sdg->set_query_filter(" Sales_Rep = $id ");
      $sdg->enable_edit();

      $dg->set_subgrid($sdg, 'Contact', 'id');
      $dg -> display();

    ?>

    <?php include_once('footer.php'); ?>
  </body>
</html>
