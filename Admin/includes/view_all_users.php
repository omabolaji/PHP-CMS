<?php
   if(isset($_GET['user_id'])){

    $the_user_id = $_GET['user_id'];
   }

?>
  <div class="col-lg-12">
       <table class="table table-bordered table-hover table-success">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Username</th>
                   <th>Firstname</th>
                   <th>Lastname</th>
                   <th>Email</th>
                   <!-- <th>Image</th> -->
                   <th>Role</th>
                   <th>Admin</th>
                   <th>Subscriber</th>
                   <th>Edit</th>
                   <th>Delete</th>
               </tr>
           </thead>
       <tbody>
           
<?php
   $query = "SELECT * FROM users";
   $select_all_users = mysqli_query($connection,$query);
   
   while($row = mysqli_fetch_assoc($select_all_users)){
       $user_id = $row['user_id'];
       $username = $row['username'];
       $user_firstname = $row['user_firstname'];
       $user_lastname = $row['user_lastname'];
       $user_email = $row['user_email'];
    //    $user_image = $row['user_image'];
       $user_role = $row['user_role'];
    //    $user_date = $row['user_date'];
    //    $randsalt = $row['randsalt'];

    
echo "<tr>";
echo "<td>{$user_id}</td>";
echo "<td>{$username}</td>";
echo "<td>{$user_firstname}</td>";
echo "<td>{$user_lastname}</td>";
echo "<td>{$user_email}</td>";
echo "<td>{$user_role}</td>";
// echo "<td><img width='100' src='../images/{$user_image}' alt=''></td>";
echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
echo "<td><a href='users.php?change_to_subs={$user_id}'>Subscriber</a></td>";
echo "<td><a href='users.php?source=edit_users&edit_users={$user_id}'>Edit</a></td>";
echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='users.php?delete={$user_id}'>Delete</a></td>";
echo "</tr>";

   }

?>

<?php

if(isset($_GET['change_to_admin'])){

    $the_user_id = $_GET['change_to_admin'];

$query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";

$change_to_admin_query = mysqli_query($connection,$query);

  header("Location: users.php");

}


if(isset($_GET['change_to_subs'])){

    $the_user_id = $_GET['change_to_subs'];

$query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";

$change_to_subs_query = mysqli_query($connection,$query);

  header("Location: users.php");


}

   if(isset($_GET['delete'])){

       $the_user_id = $_GET['delete'];

   $query = "DELETE FROM users WHERE user_id = {$the_user_id}";

   $delete_user_query = mysqli_query($connection,$query);

   header("Location: users.php");
   }

?>
                   
       </tbody> 
       </table>
       </div>