
<?php include "includes/header.php" ?>
 <?php include "includes/navbar.php" ?>
 <?php include "includes/sidebar.php" ?>
 <?php include "includes/dbadmin.php" ?>
 <?php include "function.php" ?>

 <?php
   if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];

 $profile_query = "SELECT * FROM users WHERE username = '${username}' ";

 $select_all_profile_user = mysqli_query($connection,$profile_query);

    if(!$select_all_profile_user){

        die("QUERY FAILED: " . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_all_profile_user)){

        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];

    }

   }

?>

     
<div id="page-wrapper">
    <div class="container-fluid">
     <div class="row">
       <div class="col-lg-12 col-xs-8 ml-auto">
         <h1 class="page-header">
         Welcome to Admin
         <small><?php echo $_SESSION['username']; ?></small>
         </h1>
    
 <?php
       if(isset($_POST['edit_users'])){
            // $user_id = $_POST['user_id'];
            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_role = $_POST['user_role'];
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
          
          
        
             $query = "UPDATE users SET ";
             $query .= "user_firstname = '{$user_firstname}', ";
             $query .= "user_lastname = '{$user_lastname}', ";
             $query .= "user_role = '{$user_role}', ";
             $query .= "username = '{$username}', ";
             $query .= "user_email = '{$user_email}', ";
             $query .= "user_password = '{$user_password}' "; 
             $query .= "WHERE username = '{$username}' ";
        
             $result_edit_user = mysqli_query($connection,$query);
        
         if(!$result_edit_user){
        
          die("FAILED! " . mysqli_error($connection));
         } else{

             echo  "<h5 class='text-danger text-center'>YOU JUST UPDATE YOUR PROFILE!</h5>";
         }
         
        }

?>

     


         <div class="col-lg-12">
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
 <label for="user_firstname">Firstname</label>
 <input value="<?php echo $user_firstname;?>" type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
 <label for="user_lastname">Lastname</label>
 <input value="<?php echo $user_lastname;?>" type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
<select name="user_role" id="">

<option value="subscriber"><?php echo $user_role;?></option>

         <?php
  if($user_role == 'admin') {

   echo "<option value='subscriber'>subscriber</option>";

  }else {

   echo "<option value='admin'>admin</option>";

  }

             ?>

</select>
</div>

<div class="form-group">
 <label for="username">Username</label>
 <input value="<?php echo $username;?>" type="text" class="form-control" name="username">
</div>

<div class="form-group">
 <label for="use_email">Email</label>
 <input value="<?php echo $user_email;?>" type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
 <label for="user_password">Password</label>
 <input value="<?php echo $user_password;?>" type="password" class="form-control" name="user_password">
</div>

<div class="form-group">
 <input type="submit" class="btn btn-info" name="edit_users" value="Update Profile">
</div>



</form>

</div>


       </div>
     </div>
 <div class="container-fluid">
<div id="content-wrapper">
 
 
       <!-- Sticky Footer -->
      <?php include "includes/footer.php";