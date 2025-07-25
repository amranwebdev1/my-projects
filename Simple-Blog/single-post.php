<?php
include "config.php";
include "header.php";
if(isset($_GET['id'])){
  $id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = '$id'";
 $query = mysqli_query($conn,$sql);
  
}
   ?>
<section id="content">
  <?php
  while($ftc = mysqli_fetch_assoc($query)){
    ?>
      <div class="post">
    <img src="admin/Img/<?= $ftc['image'] ?>" alt="">
    <div class="text">
      <h2><?= $ftc['title'] ?></h2>
      <p><?= $ftc['body'] ?></p>
      <br>
     <div class="box-footer">
       <p class="time"><?= $ftc['time'] ?></p>
      
     </div>
    </div>
  </div>
    <?php
  }
  ?>
</section>
<?php include "footer.php"; ?>