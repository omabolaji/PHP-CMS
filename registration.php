<?php   include "includes/header.php"  ?> 
  <?php   include "includes/db.php"   ?> 
  
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
     
  <?php   include "includes/navbar.php" ?> 
  
  </nav>

 <?php

 if(isset($_POST['submit'])){

    // $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($user_email) && !empty($password)) {

        $username = mysqli_real_escape_string($connection,$username);
        $user_email = mysqli_real_escape_string($connection,$user_email);
        $password = mysqli_real_escape_string($connection,$password);
    
    $query = "SELECT randsalt FROM users ";
    $select_randsalt_query = mysqli_query($connection,$query);
    
    if(!$select_randsalt_query){
        die("QUERY FAILED! " . mysqli_error($connection));
    }
    
     $row = mysqli_fetch_array($select_randsalt_query);
    
     $salt = $row['randsalt'];

     $password = crypt($password,$salt);
     
    $query = "INSERT INTO users (username,user_email,user_password,user_role) VALUE ('{$username}','{$user_email}','{$password}','subscriber') ";
    
        $register_query = mysqli_query($connection,$query);

         if(!$register_query) {
            die("QUERY FAILED! " . mysqli_error($connection));
        }

        $message = "<h5 class='text-primary'>Your Registration has been submitted!</h5>";

    } else {
    
    $message = "<script>alert('Fields can not be empty for registration. THANKS')</script>";
    
    } 
   
 }else{
      
    $message = "";

 }

 ?>

 <div class="container">
   <section id="login">
     <div class="container">
       <div class="row">
           <div class="col-lg-8 col-md-10 mx auto">
               <div class="form-wrap">
                 <h1 class="text-center">Register</h1> 
                 <form action="registration.php" method="post" role="form" id="login-form" autocomplete="off">

                 <?php  echo $message; ?>

                 <div class="form-group">
            <label for="username" class="">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desire Username">
            
                 </div>

                 <div class="form-group">
            <label for="email" class="">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@gmail.com">
                 </div>

                 <div class="form-group">
            <label for="password" class="">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="enter password..">
                 </div>

                <input type="submit" class="btn btn-success btn-lg btn-block" value="register" name="submit" id="btn-login">

                 </form>              
           </div>     
        </div>
       </div>    
     </div>   
  </section>
 </div>




  
<div class="footer mt-5">

  <?php   include "includes/footer.php"   ?>

</div>

