<?php 
include "../config.php"; 
include "header.php"; 

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
      <input type="text" name="title" id="title" value="" placeholder="Title"/>
    <textarea name="body" id="body" rows="20" cols="33"></textarea>
    <select name="cat" id="cat">
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
    <input type="submit" value="Publish" name="publish">
   </form>
  </section>
  
<script>
	CKEDITOR.replace( 'body' );
				</script>
</body>

</html>
<?php
if(isset($_POST['publish'])){
  $title = $_POST['title'];
  $body = $_POST['body'];
  $cat = $_POST['cat'];
  $img_name = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  $upload = "Img/".$img_name;
  move_uploaded_file($tmp_name,$upload);
  $sqld = "INSERT INTO posts(title,body,image,category,author_id) VALUES('$title','$body','$img_name','$cat','$author_id')";
  $ins_qu = mysqli_query($conn,$sqld);
  if($ins_qu){
    echo "<script>
    alert('Post successfully')
    window.location.href='index.php'
    </script>";
  }else{
    echo "<script>alert('post faild')</script>";
  }
}
?>