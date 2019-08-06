 <?php include "includes/header.php" ?>
 <?php include "includes/navbar.php" ?>
 <?php include "includes/sidebar.php" ?>
 <?php include "includes/dbadmin.php" ?>
 <?php include "function.php" ?>

 

<div class="container-fluid"> 
  <div id="page-wrapper">
     <div class="row">
       <div class="col-lg-12">
         <h1 class="page-header">
             Welcome to Admin

             <small><?php echo $_SESSION['username']; ?></small>
         </h1>
          <div class="col-xs-6">


          </div>
       </div>
    </div>


      
<div class="row">
  <div class="col-lg-3 col-md-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
       <div class="card-body">
         <div class="card-body-icon">
             <i class="fas fa-fw fa-file">
             </i>
         </div>

<?php

$query = "SELECT * FROM posts";
  $select_all_post = mysqli_query($connection,$query);
  $post_count = mysqli_num_rows($select_all_post);

  echo "<div class='huge'><b>{$post_count}</b></div>"

?>

               <div>Posts</div>
       </div>
        <a href="./posts.php" class="card-footer bg-info text-white clearfix small z-1">
           <span class="float-left">View Details</span>
           <span class="float-right">
           <i class="fas fa-arrow-circle-right">
           </i>
           </span>
        </a>
    </div>
  </div>

  <div class="col-lg-3 col-md-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
       <div class="card-body">
         <div class="card-body-icon">
             <i class="fas fa-fw fa-comments">
             </i>
         </div>
              
<?php

$query = "SELECT * FROM comments";
  $select_all_comments = mysqli_query($connection,$query);
  $comment_count = mysqli_num_rows($select_all_comments);

echo "<div class='huge'><b>{$comment_count}</b></div>"

?>
          
               <div>Comments</div>
       </div>
        <a href="./comments.php" class="card-footer bg-secondary text-white clearfix small z-1">
           <span class="float-left">View Details</span>
           <span class="float-right">
           <i class="fas fa-arrow-circle-right">
           </i>
           </span>
        </a>
    </div>
  </div> 

  <div class="col-lg-3 col-md-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
       <div class="card-body">
         <div class="card-body-icon">
             <i class="fas fa-fw fa-users">
             </i>
         </div>
              
<?php

$query = "SELECT * FROM users";
  $select_all_user = mysqli_query($connection,$query);
  $user_count = mysqli_num_rows($select_all_user);

echo "<div class='huge'><b>{$user_count}</b></div>"

?>

               <div>Users</div>
       </div>
        <a href="./users.php" class="card-footer bg-primary text-white clearfix small z-1">
           <span class="float-left">View Details</span>
           <span class="float-right">
           <i class="fas fa-arrow-circle-right">
           </i>
           </span>
        </a>
    </div>
  </div> 

  <div class="col-lg-3 col-md-6 mb-3">
    <div class="card text-white bg-info o-hidden h-100">
       <div class="card-body">
         <div class="card-body-icon">
             <i class="fas fa-fw fa-list">
             </i>
         </div>
              
<?php

$query = "SELECT * FROM categories";
  $select_all_categories = mysqli_query($connection,$query);
  $categories_count = mysqli_num_rows($select_all_categories);

echo "<div class='huge'><b>{$categories_count}</b></div>"

?>

               <div>Categories</div>
       </div>
        <a href="./categories.php" class="card-footer bg-danger text-white clearfix small z-1">
           <span class="float-left">View Details</span>
           <span class="float-right">
           <i class="fas fa-arrow-circle-right">
           </i>
           </span>
        </a>
    </div>
  </div>
</div>
 

  <?php

  $query = "SELECT * FROM posts WHERE post_status = 'published' ";
  $select_all_published_post = mysqli_query($connection,$query);
  $post_published_count = mysqli_num_rows($select_all_published_post);

  $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
  $select_all_draft_post = mysqli_query($connection,$query);
  $post_draft_count = mysqli_num_rows($select_all_draft_post);

  $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
  $select_all_unapproved_comment = mysqli_query($connection,$query);
  $comment_unapproved_count = mysqli_num_rows($select_all_unapproved_comment);

  $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
  $select_all_subscriber_user = mysqli_query($connection,$query);
  $user_subscriber_count = mysqli_num_rows($select_all_subscriber_user);


  ?>

 <div class="row mt-3">
 
 <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

          <?php
    
  $element_text = ['All Post','Active Posts','Draft Posts','Comments','Pending Comments','Users','User Subscribers','Categories'];
  $element_count = [$post_count,$post_published_count,$post_draft_count,$comment_count,$comment_unapproved_count,$user_count,$user_subscriber_count,$categories_count];
    
          for($i = 0; $i < 8; $i++) {
    
   echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
  
           }
    
                  ?>

          // ['2014', 1000],
        
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
 
 <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
 </div>

  <div id="content-wrapper">
 <div class="container-fluid">


      <!-- Sticky Footer -->
     <?php include "includes/footer.php" ?>

     