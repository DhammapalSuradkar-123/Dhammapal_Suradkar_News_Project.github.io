<?php
  include 'header_nav.php';
  include 'connection.php';
  if($_SESSION['role'] == 0){
    $post_id = $_GET['id'];
    $sql2 = "SELECT author FROM post WHERE post_id = {$post_id}";
    $squery2 = mysqli_query($conn, $sql2) or die("Error in Query : select");
    $row2 = mysqli_fetch_assoc($squery2);
    if($_SESSION['user_id'] != $row2['author']){
      header("location: {$location}/post.php");
    }
  }
?>
<div class="form_settings">
  <h2>Update Post</h2>
  <?php
     include 'connection.php';
     $post_id = $_GET['id'];
     $sql = "SELECT * FROM post WHERE post_id = {$post_id}";
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select1");
     while($row = mysqli_fetch_assoc($squery)){
  ?>
  <form action="edit_post_data.php" method="post" enctype="multipart/form-data">
    <div class="part">
      <p><b>TITAL</b></p>
      <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
      <input type="hidden" name="category_id" value="<?php echo $row['category']; ?>">
      <input type="text" name="tital" value="<?php echo $row['tital']; ?>">
    </div>
    <div class="part">
      <p><b>Description</b></p>
      <textarea name="desc" rows="8" cols="60"><?php echo $row['description']; ?></textarea>
    </div>
    <div class="part p">
      <p><b>Category</b></p>
      <select name="category">
        <option value="" disabled selected>Select Category</option>
        <?php
           $sql1 = "SELECT * FROM category";
           $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select2");

           if(mysqli_num_rows($squery1) > 0){
             while($row1 = mysqli_fetch_assoc($squery1)){
               if($row['category'] == $row1['category_id']){
                 $selected = "selected";
               }else{
                 $selected = "";
               }
        ?>
        <option <?php echo $selected; ?> value="<?php echo $row1['category_id']; ?>"><?php echo $row1['category_name']; ?></option>
        <?php
              }
            }
        ?>
      </select>
    </div>
    <div class="part">
      <p><b>Post Image</b></p>
      <input type="hidden" name="old-img" value="<?php echo $row['images']; ?>">
      <input type="file" name="img">
      <img src="images/<?php echo $row['images']; ?>" alt="post_img" width="400px">
    </div>
    <div class="part part1">
      <input type="submit" name="save" value="save">
    </div>
  </form>
  <?php } ?>
</div>
<div class="container footer footer_post">
  <?php
     $sql1 = "SELECT FooterDesc FROM settings";
     $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select");
     $row1 = mysqli_fetch_assoc($squery1);
  ?>
  <p><?php echo $row1['FooterDesc']; ?></p>
</div>
