<?php 
include "../config.php"; 
include "header.php"; 
$id = $_GET['id'];
$sql = "SELECT 
  posts.id AS post_id,
  posts.title,
  posts.body,
  posts.image,
  posts.time,
  category.cat_name AS category_name,
  user.username AS author_name
FROM posts 
LEFT JOIN category ON posts.category = category.id 
LEFT JOIN user ON posts.author_id = user.id WHERE posts.id = '$id'";
$query = mysqli_query($conn,$sql);
$ftc = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style.css" type="text/css" media="all" />
  <title></title>
  <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>
</head>

<body>
  <section class="blog-post">
   <form action="" method="POST" enctype="multipart/form-data">
      <input type="text" name="title" id="title" value="<?= $ftc['title'] ?>" placeholder="Title"/>
    <textarea name="body" id="body" rows="15" cols="33"><?= $ftc['body'] ?></textarea>
    <select name="cat" id="cat" value="<?= $ftc['category_name'] ?>">
      <option value="">Select Category</option>
      <?php
      $select = mysqli_query($conn,"SELECT * FROM category");
      while($fetch = mysqli_fetch_assoc($select)){
        ?>
        <option value="<?= $fetch['id'] ?>"><?= $fetch['cat_name']  ?></option>
        <?php
      }
      ?>
    </select>
      
    <input type="file" name="file" id="file" value="" />
   <img src="Img/<?= $ftc['image'] ?>" alt="" width="70">
    <input type="submit" value="Edited" name="edit">
   </form>
  </section>
  
<script>
	CKEDITOR.replace( 'body' );
				</script>
				<script src="../app.js"></script>
</body>

</html>
<?php
  $oldimg = $ftc['image'];
if(isset($_POST['edit'])){
  $title = $_POST['title'];
  $body = $_POST['body'];
  $cat = $_POST['cat'];
  $img_name = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  if(!empty($img_name)){
  $upload = "Img/".$img_name;
    if(file_exists("Img/".$oldimg)){
      unlink($oldimg);
    }
      move_uploaded_file($tmp_name,$upload);
    }else{
      $img_name = $oldimg;
    
  }
  $sqld = "UPDATE posts SET title = '$title',body = '$body',image = '$img_name',category = '$cat',author_id = '$author_id' WHERE id = '$id'";
  $ins_qu = mysqli_query($conn,$sqld);
  if($ins_qu){
    echo "<script>
    alert('Edit successfully')
    window.location.href='index.php'
    </script>";
  }else{
    echo "<script>alert('edit faild')</script>";
  }

}
?>