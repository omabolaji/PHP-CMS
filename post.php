 <?php   include "includes/header.php"  ?> 
  <?php   include "includes/db.php"   ?> 
  
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
     
  <?php   include "includes/navbar.php" ?> 
  
  </nav>

 
  <!-- Post Content -->
  <div class="col-md-3 float-right">
    <div class="card mt-3 p-3">
      <h4>Blog Search</h4>
      <form action="search.php" method="post">
        <div class="input-group">
          <input type="text" name="search" class="form-control">
          <span class="input-group-btn">
           <button name="submit" class="btn btn-primary" type="submit">
             <span class="glyphicon glyphicon-search"></span>
           </button>
          </span>
        </div>
        </form>
      </div>

       <div class="card mt-3 p-3">
        <h4>Blog Category</h4>
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled">
<?php
 $querry = "SELECT * FROM categories ";
   $select_all_cat_blog = mysqli_query($connection,$querry);

   while($row = mysqli_fetch_assoc($select_all_cat_blog)){

    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

   echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

   }
?>
                <!-- <li><a href="">Category Name</a></li>
                <li><a href="">Category Name</a></li>
                <li><a href="">Category Name</a></li>
                <li><a href="">Category Name</a></li> -->
              </ul>
            </div>
          </div>
       </div>
     
      <div class="card border-default mt-3 p-3">
    <h5>Side Widget Well</h5>
    <p>This is all about trying to get something working again, I know by God grace is going to be ok.</p>
   </div>

  </div>
  
  <hr> 

<div class="container">
     <div class="col-lg-8"> 
     <!-- <div class="col-lg-8 col-md-10 mx-auto">  -->
    <!-- <div class="row"> -->


     <?php  
          
if(isset($_GET['p_id'])){

   $the_post_id = $_GET['p_id'];
}


 $querry = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";

 $select_all_posts = mysqli_query($connection,$querry);
    
 while($row = mysqli_fetch_assoc($select_all_posts)){
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content  = $row['post_content'];

    ?>

        <div class="post-preview">
          <a href="post.php">
            <h2 class="post-title">
            <?php echo $post_title; ?>
            </h2>
            <!-- <hr> -->
        <img src="images/<?php echo $post_image;?>" alt="images" class="img-responsive">
        <!-- <hr> -->
            <h3 class="post-subtitle">
            <?php echo $post_content; ?>
            </h3>
          </a>
          <p class="post-meta text-muted">Posted by
            <a href="#"><?php echo $post_author; ?></a>
            <?php echo $post_date; ?></p>
        </div>
        <!-- <hr> -->

        <?php }?>
 
     <!-- <div class="container"> -->
      <!-- <div class="row"> -->
<?php
       if(isset($_POST['create_comment'])){

       $the_post_id = $_GET['p_id'];
       
       $comment_author = $_POST['comment_author'];
       $comment_email = $_POST['comment_email'];
       $comment_content = $_POST['comment_content'];

$comment_author = mysqli_real_escape_string($connection,$comment_author);
$comment_content = mysqli_real_escape_string($connection,$comment_content);


       if(!empty($comment_author) && !empty($comment_email) && !empty($comment_author) ) {
       
    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now()) ";

    $create_comment_query = mysqli_query($connection,$query);

    if(!$create_comment_query){

      die("QUERY FAILED " . mysqli_error($connection));
    }

   $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 "; 
   $query .= "WHERE post_id = $the_post_id ";

  $update_comment_count = mysqli_query($connection,$query);

 } else {

  echo "<script>alert('This fields can not be empty')</script>";
 }

  }
?>
      <div class="col-lg-8 col-md-10 mx auto">
        <!-- <div class="col-xl-6"> -->
       <div class="card p-3  bg-secondary">
         <h4>Leave a Comment</h4>
         <form action="" method="post" role="form">

         <div class="form-group">

         <label for="author">Author</label>
           <input type="text" class="form-control" name="comment_author"> 
           </div>

           <div class="form-group">
           <label for="email">Email</label>
           <input type="email" class="form-control" name="comment_email">
           </div>

           <div class="form-group">
           <label for="comment">Your Comment</label>
           <textarea rows="3" name="comment_content" class="form-control"></textarea>
           </div>
      <button type="submit" name="create_comment" class="btn btn-success">Submit</button>
         </form>
       </div>
     </div>


<?php

$query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} AND comment_status = 'approved' ORDER BY comment_id DESC ";

$select_comment_query = mysqli_query($connection,$query);

 if(!$select_comment_query){
     die("QUERY FAILED " . mysqli_error($connection)); 

 }

 while($row = mysqli_fetch_assoc($select_comment_query)){
   $comment_date = $row['comment_date'];
   $comment_content = $row['comment_content'];
   $comment_author = $row['comment_author'];
      
      ?>

<div class="media mt-3">
 
        <a href="#" class="pull-left">
        <img src="images/face2.jpg" alt="image">
        </a>
        <div class="media-body">
    <h6 class="meida-heading"><?php echo $comment_author; ?> <small><?php echo $comment_date; ?></small>
        </h6>
       <?php echo $comment_content; ?>

     </div>
    </div>

 <?php } ?>


      
      <!-- </div> -->
    
      <!-- </div>      -->
       <!-- </div>      -->
<!-- <hr> -->


        <div class="clearfix mt-3 mb-3">
          <a class="btn btn-primary float-right" href="index.php">Older Posts &rarr;</a>
        </div>
      </div>
      </div>
  </div>


  <!-- Footer -->
  
 <?php   include "includes/footer.php"   ?>
