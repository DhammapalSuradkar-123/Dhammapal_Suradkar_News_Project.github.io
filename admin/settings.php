<?php
  include 'header_nav.php';
?>
<div class="form_settings">
  <h2><span class="badge-s">Website Settings</span></h2>
  <?php
     include 'connection.php';
     $sql = "SELECT * FROM settings";
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select");

     if(mysqli_num_rows($squery) > 0){
       while($row = mysqli_fetch_assoc($squery)){
  ?>
  <form action="save-settings.php" method="post" enctype="multipart/form-data">
    <div class="part">
      <p><b>Website Name</b></p>
      <input type="text" name="website_name" value="<?php echo $row['website_name']; ?>">
    </div>
    <div class="part">
      <p><b>Website Logo</b></p>
      <input type="file" name="logo">
      <img src="user-img/<?php echo $row['website_logo']; ?>">
      <input type="hidden" name="old-logo" value="<?php echo $row['website_logo']; ?>">
    </div>
    <div class="part">
      <p><b>Footer Description</b></p>
      <textarea name="Description" rows="8" cols="60"><?php echo $row['FooterDesc']; ?></textarea>
    </div>
    <div class="part part1">
      <input type="submit" name="save" value="save">
    </div>
  </form>
  <?php
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
