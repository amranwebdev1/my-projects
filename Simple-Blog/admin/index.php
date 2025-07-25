<?php
include "../config.php";
include "header.php";
?>
<?php

if(isset($_POST['delete'])){
  
  $id = $_POST['h_id'];
   $image = "Img/".$_POST['img'];
   if(!empty($image)){
    unlink($image);
     
   }
$qu =  mysqli_query($conn,"DELETE FROM posts WHERE id = '$id'");
}

?>
<link rel="stylesheet" href="../style.css">
<a href="post.php" class="addBlog">Add Blog</a>
  <div>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>title</th>
          <th>time</th>
          <th colspan="2">action</th>
        </tr>
      </thead>
      <tbody>
        <?php
       // $sql = "SELECT * FROM posts LEFT JOIN category ON posts.category = category.id LEFT JOIN user ON posts.author_id = user.id";
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
        $count = 0;
        $row = mysqli_num_rows($query);
      if($row){
        while($ftc = mysqli_fetch_assoc($query)){
          ?>
          <tr>
            <td><?= ++$count ?></td>
            <td><?= $ftc['title'] ?></td>
            <td><?= $ftc['time'] ?></td>
            <td><a href="edit.php?id=<?= $ftc['post_id'] ?>" id="edit">Edit</a></td>
            <td>
        <form action="" method="POST" onsubmit=" return confirm('Do you want to delete')">
          <input type="hidden" name="h_id" value="<?= $ftc['post_id'] ?>">
          <input type="hidden" name="img" value="<?= $ftc['image'] ?>">
           <input type="submit" id="delete" name="delete" value="Delete">
        </form>
            </td>
          </tr>
          <?php
        }
      }else{
        ?>
        <tr><td colspan="4">No Data</td></tr>
        <?php
      }
        ?>
      </tbody>
    </table>
  </div>
  <script>
let menu = document.querySelector('#menu')
let side = document.querySelector('.side');
menu.addEventListener('click',()=>{
  side.classList.toggle('active')
})
  </script>
</body>

</html>
