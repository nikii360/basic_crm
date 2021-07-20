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
      $_GET['currentPage'] = 'customerwon';
      include_once('menu.php');
    ?>

    <h3>Customers Won</h3>

    <?php
      $id= $_SESSION["ID"];
      $dg = new \C_DataGrid("SELECT * FROM contact", "id", "contact");
      $dg->set_query_filter(" Status = 3  && sales_rep = $id ");

      $dg->set_col_hidden('id')->set_col_hidden('Status')->set_caption('Customers');
      $dg->set_col_hidden('Date_of_Initial_Contact');
      $dg->set_col_hidden('Contact_Title')->set_col_hidden('Contact_Middle')->set_col_hidden('Lead_Referral_Source');
      $dg->set_col_hidden('Address')->set_col_hidden('Address_Street_1')->set_col_hidden('Address_Street_2');
      $dg->set_col_hidden('Address_City')->set_col_hidden('Address_State')->set_col_hidden('Address_Zip')->set_col_hidden('Address_Country');
      $dg->set_col_hidden('LinkedIn_Profile')->set_col_hidden('Background_Info');
      $dg->set_col_hidden('Sales_Rep')->set_col_hidden('Project_Description')->set_col_hidden('Proposal_Due_Date')->set_col_hidden('Deliverables');
      $dg->set_col_format("Email", "email");
      $dg->set_col_currency('Budget');
      $dg -> set_col_link("Website");
      $dg->enable_edit('FORM', 'CRUD');


      $sdg = new \C_DataGrid("SELECT * FROM notes", "id", "notes");
      $sdg->set_query_filter(" Sales_Rep = $id ");
      $sdg->set_col_hidden('id', false)->set_col_hidden('Contact', false)->set_col_hidden('Sales_Rep', false);;
      $sdg->set_col_edittype('Add_Task_or_Meeting', 'select', 'Select id, status From task_status');
      $sdg->set_col_edittype('Task_Status', 'select', 'Select id, status From task_status');
      $sdg->set_col_edittype('Is_New_Todo', 'select', '0:No;1:Yes');
      $sdg->set_col_edittype('Todo_Type_ID', 'select', 'Select id, type From todo_type');
      $sdg->set_col_edittype('Todo_Desc_ID', 'select', 'Select id, description From todo_desc');
      $sdg->set_col_default('Sales_Rep', $id); // TODO: obtain from SESSION
      $sdg->enable_edit();


      $dg->set_subgrid($sdg, 'Contact', 'id');
      $dg -> display();
    ?>

    <?php include_once('footer.php'); ?>
  </body>
</html>
