
<?php   include "includes/header.php"  ?> 
  <?php   include "includes/db.php"   ?> 
  
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
     
  <?php   include "includes/navbar.php" ?> 
  
  </nav>

<!-- <div class="row float-right"> -->

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
   </form>  <!-- //search form  -->
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


<div class="container">
     <div class="col-lg-8"> 
     <!-- <div class="col-lg-8 col-md-10 mx-auto">  -->
    <!-- <div class="row"> -->


     <?php  

     if(isset($_GET['category'])){
          
        $post_category_id = $_GET['category'];

     }
          
 
 $query = "SELECT * FROM posts WHERE post_category_id={$post_category_id} ";

 $select_all_posts_cat = mysqli_query($connection,$query);
    
 while($row = mysqli_fetch_assoc($select_all_posts_cat)){
  $post_id = $row['post_id'];
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content  = $row['post_content'];
    ?>

        <div class="post-preview">
          <a href="post.php?p_id=<?php echo $post_id ?>">
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
        </div>
        <!-- <hr> -->

        <?php }?>

       

        <!-- <div class="clearfix  mt-4">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div> -->
      </div>
      </div>
  </div>

  
 <div class="footer">

        <?php   include "includes/footer.php"   ?>

        </div>