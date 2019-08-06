

<div class="col-md-3 float-right">

<div class="card border-default mb-3 mt-4 p-2">
  <h5>Blog Search</h5>
  <form action="search.php" method="post">
   <div class="input-group">
       <input name="search" type="text" class="form-control">
       <span class="input-group-btn">
           <button name="submit" class="btn btn-default" type="submit">
               <span class="glyphicon glyphicon-search"></span>
           </button>
       </span>
   </div>
   </form>  
</div>

<!-- //login form  -->
<div class="card border-default mb-3 mt-4 p-2 bg-secondary">
  <h5>Login</h5>
  <form action="includes/login.php" method="post">

   <div class="form-group">
       <input name="username" type="text" class="form-control" placeholder="Enter Username">
   </div>

   <div class="input-group">
       <input name="password" type="password" class="form-control" placeholder="Enter Password">
    <span class="input-group-btn">
    <button class="btn-medium btn-primary" name="login" type="submit">Sign In</button>
    </span>
   </div>
      <!-- <input type="submit" value="Sign In" name="submit" class="btn btn-outline-success"> -->
   </form>  
</div>


<div class="card border-default mb-3 p-2">
    <h5>Blog Categories</h5>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">

            <?php
 $querry = "SELECT * FROM categories";

 $select_all_cat_blog = mysqli_query($connection,$querry);

 while($row = mysqli_fetch_assoc($select_all_cat_blog)){

    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

    // echo "<li><a href='category.php'>{$cat_title}</a></li>";

    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
 }
            ?>
               <!-- <li><a href="#">Category Name</a></li>
               <li><a href="#">Category Name</a></li>
               <li><a href="#">Category Name</a></li>
               <li><a href="#">Category Name</a></li> 
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="list-unstyled">
               <li><a href="#">Category Name</a></li>
               <li><a href="#">Category Name</a></li>
               <li><a href="#">Category Name</a></li>
               <li><a href="#">Category Name</a></li>  -->
            </ul>
        </div>
    </div>
</div>
 <div class="card border-default p-2">
    <h5>Side Widget Well</h5>
    <p>This is all about trying to get something working again, I know by God grace is going to be ok.</p>
 </div>
</div>
</div>
<!-- </div> -->

    <!-- <div class="row"> -->
<div class="container">
     <div class="col-lg-8"> 
     <!-- <div class="col-lg-8 col-md-10 mx-auto">  -->


     <?php  
          
 $querry = "SELECT * FROM posts WHERE post_status = 'published' ";

 $select_all_posts = mysqli_query($connection,$querry);
    
 while($row = mysqli_fetch_assoc($select_all_posts)){
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content  = substr($row['post_content'],0,60);
  $post_status = $row['post_status'];
    
// if($post_status == 'draft'){

//   echo "<h1> NO POST TO DISPLAY SORRY </h1>";

// }else{

    if($post_status == 'published'){
    ?>

        <div class="post-preview">
          <a href="post.php?p_id=<?php echo $post_id; ?>">
            <h2 class="post-title">
            <?php echo $post_title ?>
            </h2>
            <!-- <hr> -->
        <img src="images/<?php echo $post_image;?>" alt="images" class="img-responsive">
        <!-- <hr> -->
            <h3 class="post-subtitle">
            <?php echo $post_content ?>
            </h3>
          </a>
          <p class="post-meta text-muted">Posted by
            <a href="#"><?php echo $post_author ?></a>
            <?php echo $post_date ?></p>

            <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-primary">Read More</a>
        </div>
        <!-- <hr> -->

<?php } } ?>

       

        <div class="clearfix mt-3 mb-3">
          <a class="btn btn-primary float-right" href="index.php">Older Posts &rarr;</a>
        </div>
      </div>
      </div>
  </div>
  
 <!-- </div>  -->