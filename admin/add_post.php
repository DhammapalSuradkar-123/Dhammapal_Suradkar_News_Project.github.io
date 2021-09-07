<?php include 'header_nav.php' ?>
<div class="form_settings">
  <h2>Add New Post</h2>
  <?php
     include 'connection.php';
     $sql = "SELECT * FROM category";
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select");

     if(mysqli_num_rows($squery) > 0){
  ?>
  <form action="add_post_data.php" method="post" enctype="multipart/form-data">
    <div class="part">
      <p><b>TITAL</b></p>
      <input type="text" name="tital" required>
    </div>
    <div class="part">
      <p><b>Description</b></p>
      <textarea name="Description" rows="8" cols="60" required></textarea>
    </div>
    <div class="part p">
      <p><b>Category</b></p>
      <select name="category" required>
        <option value="" disabled selected>Select Category</option>
        <?php
           while($row = mysqli_fetch_assoc($squery)){
        ?>
        <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="part">
      <p><b>Post Image</b></p>
      <input type="file" name="img" required>
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
