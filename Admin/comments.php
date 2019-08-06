
<?php include "includes/header.php" ?>
 <?php include "includes/navbar.php" ?>
 <?php include "includes/sidebar.php" ?>
 <?php include "includes/dbadmin.php" ?>
 <?php include "function.php" ?>

 

  <div id="page-wrapper">
    <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12 col-xs-8 ml-auto">
         <h1 class="page-header">
         Welcome to Admin
         <small><?php echo $_SESSION['username']; ?></small>
         </h1>

<?php

if(isset($_GET['source'])){

    $source = $_GET['source'];  
}else{
    $source = '';
}

  switch($source){

    case 'add_post';
    
    include "includes/add_post.php";
    
    break;

    case 'edit_post';

    include "includes/edit_post.php";

    break;

    case '8';
    echo "nice 8";
    break;

    default;

    include "includes/view_all_comments.php";

    break;
  }

    


?>

       </div>
     </div>
 <div class="container-fluid">
<div id="content-wrapper">
 
 
       <!-- Sticky Footer -->
      <?php include "includes/footer.php";