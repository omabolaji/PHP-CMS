<?php include "includes/dbadmin.php";

function Insert_cat(){

     global $connection;

    if(isset($_POST['submit'])){

        $cat_title = $_POST['cat_title'];

    $cat_title = mysqli_real_escape_string($connection,$cat_title); 
      
        if($cat_title == "" || empty($cat_title)){
      
          echo "This field should not be empty";
      
        } else{
      
          $query = "INSERT INTO categories(cat_title) ";
          $query .= "VALUE('{$cat_title}') ";
      
      
          $create_cat_query = mysqli_query($connection,$query);
      
          if(!$create_cat_query) {
      
            die("QUERY FAILED" . mysqli_error($connection));
          }
        }
      
      }

}

 function Add_select_cat(){
    global $connection;
   
    // Delete_cat();

    $query = "SELECT * FROM categories";
$select_all_cat = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($select_all_cat)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";
}
 }

 function Delete_cat(){
    global $connection;

    // Add_select_cat();

    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
      $delete_cat = "DELETE FROM categories WHERE cat_id = {$the_cat_id} "; 
      
      $query = mysqli_query($connection,$delete_cat);
      
      header("Location: categories.php");
      
      }
 }




?>