<?php
include "config.php";
include "header.php";
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
LEFT JOIN user ON posts.author_id = user.id ORDER BY post_id DESC";
   $query = mysqli_query($conn,$sql);
?>
<section id="content">
  <?php
  while($ftc = mysqli_fetch_assoc($query)){
    ?>
    <a href="single-post.php?id=<?= $ftc['post_id'] ?>">
      <div class="post">
    <img src="admin/Img/<?= $ftc['image'] ?>" alt="">
    <div class="text">
      <h2><?= $ftc['title'] ?></h2>
      <p><?= substr($ftc['body'],0,200)."..." ?></p>
      <br>
      <a href="single-post.php?id=<?= $ftc['post_id'] ?>" class="read-btn">Read more</a>
     <div class="box-footer">
       <p class="time"><?= $ftc['time'] ?></p>
      <p><?= $ftc['category_name'] ?></p>
     </div>
    </div>
  </div>
  </a>
    <?php
  }
  ?>
</section>
<?php include "footer.php"; ?>