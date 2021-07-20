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
      $_GET['currentPage'] = 'leads';
      include_once('menu.php'); ?>

    <h3>Leads</h3>

    <?php
      $id= $_SESSION["ID"];
      $dg = new \C_DataGrid("SELECT id, contact_first, contact_last, company, phone, email, website, status, lead_referral_source, sales_rep, lead_referral_source, date_of_initial_contact, title, industry, background_info, rating, project_type, project_description, budget FROM contact", "id", "contact");
      $dg->set_query_filter(" status = 1 && sales_rep = $id ")->set_caption('Contact');
      $dg->set_col_hidden('id')->set_col_hidden('Status')->set_col_hidden('sales_rep', false);
      $dg->set_col_hidden('lead_referral_source, title, industry, background_info, rating, project_type, project_description, budget');
      $dg -> set_col_format("email", "email");
      $dg->set_col_edittype('status', 'select', 'SELECT ID, status FROM contact_status');
      $dg -> set_col_link("website");
      $dg->enable_edit();

      $sdg = new \C_DataGrid("SELECT * FROM notes", "id", "notes");
      $sdg->set_query_filter(" Sales_Rep = $id ");
      $sdg->set_col_hidden('id')->set_col_hidden('Contact', false)->set_col_hidden('Sales_Rep', false);
      $sdg->set_col_edittype('Add_Task_or_Meeting', 'select', 'Select id, status From task_status');
      $sdg->set_col_edittype('Task_Status', 'select', 'Select id, status From task_status');
      $sdg->set_col_edittype('Is_New_Todo', 'select', '0:No;1:Yes');
      $sdg->set_col_edittype('Todo_Type_ID', 'select', 'Select id, type From todo_type');
      $sdg->set_col_edittype('Todo_Desc_ID', 'select', 'Select id, description From todo_desc');

      $sdg->set_col_default('Sales_Rep', $id);
      $sdg->enable_edit();


      $dg->set_subgrid($sdg, 'Contact', 'id');
      $dg -> display();
    ?>

    <?php include_once('footer.php'); ?>
  </body>
</html>
