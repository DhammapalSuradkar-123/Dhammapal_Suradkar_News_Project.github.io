<?php include 'header_nav.php'; ?>
<div class="form_settings">
  <h2>Update Category</h2>
  <?php
     include 'connection.php';
     $category_id = mysqli_real_escape_string($conn, $_GET['id']);
     $sql = "SELECT * FROM category WHERE category_id = '{$category_id}'";
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
     while($row = mysqli_fetch_assoc($squery)){
  ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="part p">
      <p><b>CATEGORY NAME</b></p>
      <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
      <input type="text" name="category_name" value="<?php echo $row['category_name']; ?>">
    </div>
    <div class="part part1 p1">
      <input type="submit" name="save" value="save">
    </div>
  </form>
  <?php
     }
     if(isset($_POST['save'])){
       $cate_id = mysqli_real_escape_string($conn, $_POST['category_id']);
       $cate_name = mysqli_real_escape_string($conn, $_POST['category_name']);
       $sql = "UPDATE category SET category_name = '{$cate_name}' WHERE category_id = $cate_id";
       $squery = mysqli_query($conn, $sql) or die("Error in Query : update");
       header("location: {$location}/category.php");
     }
  ?>
</div>
<div class="container footer footer_post">
  <?php
     $sql1 = "SELECT FooterDesc FROM settings";
     $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select");
     $row1 = mysqli_fetch_assoc($squery1);
  ?>
  <p><?php echo $row1['FooterDesc']; ?></p>
</div>
