 <?php

  if(isset($_POST['create_user'])){

      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $user_role = $_POST['user_role'];
      
      $username = $_POST['username'];
      $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];

//    $user_image = $_FILES['image']['name'];
//  $user_image_temp = $_FILES['image']['tmp_name'];
//  $ user_date = date('d-m-y');
//    $randsalt = $_POST['randsalt'];
// move_uploaded_file($user_image_temp, "../images/$user_image");

$user_firstname = mysqli_real_escape_string($connection,$user_firstname);
$user_lastname = mysqli_real_escape_string($connection,$user_lastname);
$username = mysqli_real_escape_string($connection,$username);



  $query = "INSERT INTO users (user_firstname,user_lastname,user_role,username,user_email,user_password) VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

  $add_users = mysqli_query($connection,$query);

  if(!$add_users){
      die("QUERY FAILED " . mysqli_error($connection));
  }

echo "User Created: " . " " . "<a class='btn btn-success list-unstyled' href='users.php'>View Users</a>";

  }
?>
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>
  
  <div class="form-group">
  <select name="user_role" id="" class="form-control">

  <option value="subscriber">Select Options</option>
  <option value="admin">Admin</option>
  <option value="subscriber">Subscriber</option>
  
  </select>
  </div>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <div class="form-group">
    <label for="use_email">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
  </div>



</form>