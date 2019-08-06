<?php

if(isset($_POST['create_post'])){

 $post_title = $_POST['title'];
 $post_category_id = $_POST['post_category'];
 $post_author = $_POST['author'];
 $post_status = $_POST['post_status'];

 $post_image = $_FILES['image']['name'];
 $post_image_temp = $_FILES['image']['tmp_name'];


 $post_tags = $_POST['post_tags'];
 $post_content = $_POST['post_content'];
 $post_date = date('d-m-y');


  move_uploaded_file($post_image_temp, "../images/$post_image");

  $post_title = mysqli_real_escape_string($connection,$post_title);
  $post_author = mysqli_real_escape_string($connection,$post_author);
  $post_tags = mysqli_real_escape_string($connection,$post_tags);
 $post_content = mysqli_real_escape_string($connection,$post_content);

 $query = "INSERT INTO posts(post_category_id,post_title,post_author, post_date,post_image,post_content,post_tags,post_status) VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";

 $result = mysqli_query($connection,$query);

 if(!$result){
   die("FAILED " . mysqli_error($connection));
 }

 echo "Post Created: " . " " . "<a class='btn btn-success list-unstyled' href='posts.php'>View Post</a>";

}
?>
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>


  <div class="form-group">

   <select name="post_category" id="">
<?php

  $query = "SELECT * FROM categories ";
  $select_all_cats = mysqli_query($connection,$query);
  
  if(!$select_all_cats){
      die("FAILED " . mysqli_error($connection));
  }


  while($row = mysqli_fetch_assoc($select_all_cats)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title']; 

 echo "<option value='$cat_id'>{$cat_title}</option>";

  }    
?>
   </select>
</div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">
  </div>


  <div class="form-group">
    <select name="post_status" id="">
    
          <option value="draft">Post Status</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
            
    </select>
   
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" col="60" row="">
    </textarea>
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
  </div>



</form>