<?php include "includes/dbadmin.php"; ?>
                              
 <?php ob_start(); ?>

<?php session_start(); ?>
 
<?php

 if(!isset($_SESSION['user_role'])){

   header("Location: ../index.php");

 }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CMS-Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <!-- <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css1/bootstrap.min.css">
  <link rel="stylesheet" href="css1/styles.css">
  <link rel="stylesheet" href="css1/bootstrap-grid.min.css">
  <link rel="stylesheet" href="css1/bootstrap-reboot.min.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
 
  <!-- <script src="js/scripts.js"></script> -->
</head>

<body id="page-top">