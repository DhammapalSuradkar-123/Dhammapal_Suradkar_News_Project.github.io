<?php
   include 'header_nav.php';
 ?>
<div class="form_settings">
  <h2>Add New Category</h2>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="part p">
      <p><b>CATEGORY NAME</b></p>
      <input type="text" name="Category_name">
    </div>
    <div class="part part1 p1">
      <input type="submit" name="save" value="save">
    </div>
  </form>
  <?php
     if(isset($_POST['save'])){
       if(empty($_POST['Category_name'])){
         echo "<div id='errors'><b>Please Enter Category.</b></div>";
       }else{
         include 'connection.php';
         $category = mysqli_real_escape_string($conn, $_POST['Category_name']);

         $sql = "SELECT * FROM category WHERE category_name = '{$category}'";
         $squery = mysqli_query($conn, $sql) or die("Error in Query : select");

         if(mysqli_num_rows($squery) > 0){
           echo "<div id='errors'>This Category is Already Exists.</div>";
         }else{
           $sql1 = "INSERT INTO category (category_name) VALUES ('$category')";
           $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : insert");
           header("location: {$location}/category.php");
         }
       }
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
