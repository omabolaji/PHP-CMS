


  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-primary"> -->

  <div class="container">
      <a class="navbar-brand" href="index.php">CMS Front</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <!-- <i class="fas fa-bars"></i> -->
      <span class="navbar-toggler-icon"></span>

      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">

          <?php
 $querry = "SELECT * FROM categories ";
 
 $select_all_categories_querry = mysqli_query($connection,$querry);

 while($row = mysqli_fetch_assoc($select_all_categories_querry)){
     $cat_title = $row['cat_title'];
   
     echo "<li class='nav-item'><a class='nav-link' href='#'>{$cat_title}</a></li>";
}

?>

          <li class="nav-item">
            <a class="nav-link" href="Admin">Admin</a>
          </li>

          <?php

    if(isset($_SESSION['user_role'])){
      
      if(isset($_GET['p_id'])){

        $the_post_id = $_GET['p_id'];

      echo "<li class='nav-item'><a class='nav-link' href='Admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
  }

}

          ?>

          <li class="nav-item">
            <a class="nav-link" href="registration.php">Register</a>
          </li>

        </ul>
      </div>
  </div>
<!-- </nav> -->


     <!-- Page Header -->
  <!-- <header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Man must explore, and this is exploration at its greatest</h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
          </div>
        </div>
      </div>
    </div>
  </header> -->
