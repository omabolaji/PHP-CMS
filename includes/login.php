 
<?php   include "db.php"; ?>
<?php session_start(); ?>

<?php

 if(isset($_POST['login'])){

  // $password = "secret";
  // $hash_format = "$2y$10$";
  // $salt = "iusesomecrazystrings22";

  // echo strlen($salt);

  // crypt($password, "$2y$10&iusesomecrazystrings22");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

      $query = "SELECT * FROM users WHERE username = '{$username}' ";

 $select_user_query = mysqli_query($connection,$query);

     if(!$select_user_query){

        die("QUERY FAILED! " . mysqli_error($connection));
     }


      while($row = mysqli_fetch_assoc($select_user_query)){

           $db_user_id = $row['user_id'];        
           $db_username = $row['username'];        
           $db_user_password = $row['user_password'];        
           $db_user_firstname = $row['user_firstname'];        
           $db_user_lastname = $row['user_lastname'];        
           $db_user_role = $row['user_role'];        
                   
      }

      // $password = crypt($password,$db_user_password);

  if($username === $db_username && $password === $db_user_password){

    // header("Location: ../index.php");

      $_SESSION['username'] = $db_username;
      $_SESSION['user_firstname'] = $db_user_firstname;
      $_SESSION['user_lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;
  
    header("Location: ../Admin");

  // } else if ($username == $db_username && $password == $db_user_password){

  //  $_SESSION['username'] = $db_username;
  //  $_SESSION['user_firstname'] = $db_user_firstname;
  //  $_SESSION['user_lastname'] = $db_user_lastname;
  //  $_SESSION['user_role'] = $db_user_role;
   
  
  //   header("Location: ../admin");
 
  } else {
    echo "please check ur login details";
      header("Location: ../index.php");
  }

 }
 

?>