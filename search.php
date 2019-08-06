
<?php   include "includes/header.php"   ?> 
<?php   include "includes/db.php"   ?> 


  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <?php   include "includes/navbar.php" ?> 
      </nav>


        
  <!-- Main Content -->

  <div class="container">
    <div class="row">
     <div class="col-lg-8 col-md-10 mx-auto"> 

     
  <?php

if(isset($_POST['submit'])){
$search = $_POST['search'];

$querry = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

$search_result = mysqli_query($connection,$querry);

if(!$search_result) {
  die("QUERY FAILED!" . mysqli_error($connection));
}
$count = mysqli_num_rows($search_result);
if($count == 0) {

  echo "<h1> no result </h1>";
}
else {
  
while($row = mysqli_fetch_assoc($search_result)){
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content  = $row['post_content'];
    ?>

      <div class="post-preview">
        <a href="post.php">
          <h2 class="post-title">
          <?php echo $post_title ?>
          </h2>
          <hr>
      <img src="images/<?php echo $post_image;?>" alt="images" class="img-responsive">
      <hr>
          <h3 class="post-subtitle">
          <?php echo $post_content ?>
          </h3>
        </a>
        <p class="post-meta text-muted">Posted by
          <a href="#"><?php echo $post_author ?></a>
          <?php echo $post_date ?></p>
      </div>
      <hr>

      <?php }

}
  } ?>


<hr>
  <!-- Footer -->
 <?php   include "includes/footer.php"   ?>

</div>


 

  