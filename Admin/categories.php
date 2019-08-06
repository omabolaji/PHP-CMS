
 <?php include "includes/header.php" ?>
 <?php include "includes/navbar.php" ?>
 <?php include "includes/sidebar.php" ?>
 <?php include "includes/dbadmin.php" ?>
 <?php include "function.php" ?>

 

  <div id="page-wrapper">
    <div class="container-fluid">
     <div class="row">

       <div class="col-lg-12">
         <h1 class="page-header">
             Welcome to Admin
             <small><?php echo $_SESSION['username']; ?></small>
         </h1>
           <div class="col-xs-6">

<?php   

  Insert_cat();    //INSERT CATEGORY
?>

<form action="" method="post">
               <div class="form-group">
                 <label for="cat-title">Add Category</label>
                 <input type="text" class="form-control" name="cat_title">
               </div>
               <div class="form-group">
                 <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
               </div>
             </form>   

<?php
        //UPDATE AND INCLUDE CATEGORY

 if(isset($_GET['edit'])){
   
    $cat_id = $_GET['edit'];

    include "includes/updat_cat.php";
 }


?>
           </div>
       </div>
</div>
        <div class="col-xs-6 float-right">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Category Title</th>
              </tr>
            </thead>
            <tbody>
<?php
   
   Add_select_cat();  //ADD AND SELECT CATEGORIES 

  //  Delete_cat();
?>

  
<?php
        
   Delete_cat();   //DELETE CATEGORIES QUERY!
?>
            </tbody>
          </table>

        </div>
 

<div class="container-fluid">
   <div id="content-wrapper">


      <!-- Sticky Footer -->
     <?php include "includes/footer.php" ?>;
