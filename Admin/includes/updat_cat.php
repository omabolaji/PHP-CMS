



             <form action="" method="post">
               <div class="form-group">
                 <label for="cat-title">Edit Category</label>
<?php
     //UPDATE AND EDIT CATEGORIES 

 if(isset($_GET['edit'])){
     $cat_id =$_GET['edit'];
     
     $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
     $select_all_cat_id = mysqli_query($connection,$query);
     
     while($row = mysqli_fetch_assoc($select_all_cat_id)){
         $cat_id = $row['cat_id'];
         $cat_title = $row['cat_title']; 

     ?>

<input type="text" class="form-control" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?> ">
  
 <?php }} ?>

 <?php

      //UPDATE CATEGORY

   if(isset($_POST['update_category'])){

  $the_cat_title = $_POST['cat_title'];

  $update_cat = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} "; 

  $update_query = mysqli_query($connection,$update_cat);

  if(!$update_query) {

    die("QUERY FAILED!" . mysqli_error($connection));
  }

}
?>
              
               </div>
               <div class="form-group">
                 <input type="submit" name="update_category" class="btn btn-success" value="Update Category">
               </div>
             </form>
