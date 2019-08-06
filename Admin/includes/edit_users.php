 <?php
   if(isset($_GET['edit_users'])){

    $the_user_id = $_GET['edit_users'];
   


  $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_users_query = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($select_users_query)){
    $user_id = $row['user_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $username = $row['username'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    

 }

  }


 if(isset($_POST['submit'])){
  
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

$user_firstname = mysqli_real_escape_string($connection,$user_firstname);
$user_lastname = mysqli_real_escape_string($connection,$user_lastname);
$username = mysqli_real_escape_string($connection,$username);
  
  
    // $query = "SELECT randsalt FROM users ";
    // $select_randsalt_query = mysqli_query($connection,$query);
    
    // if(!$select_randsalt_query){
    //     die("QUERY FAILED! " . mysqli_error($connection));
    // }


    // $row = mysqli_fetch_array($select_randsalt_query);
    //  $salt = $row['randsalt'];
    //  $hashed_password = crypt($user_password,$salt);


     $query = "UPDATE users SET ";
     $query .= "user_firstname = '{$user_firstname}', ";
     $query .= "user_lastname = '{$user_lastname}', ";
     $query .= "user_role = '{$user_role}', ";
     $query .= "username = '{$username}', ";
     $query .= "user_email = '{$user_email}', ";
     $query .= "user_password = '{$user_password}' "; 
     $query .= "WHERE user_id = '{$the_user_id}' ";

     $result_edit_user = mysqli_query($connection,$query);

 if(!$result_edit_user){

  die("FAILED! " . mysqli_error($connection));
 }


 echo "<p class='text-danger'><b>User Updated:</b> " . " " . "<a class='text-success' href='./users.php'>View Users</a></p>";

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

<option value="<?php echo $user_role;?>"><?php echo $user_role;?></option>

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
  <input type="submit" class="btn btn-success" name="submit" value="Update User">
</div>



</form>

</div>