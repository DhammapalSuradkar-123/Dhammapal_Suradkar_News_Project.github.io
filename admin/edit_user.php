<?php
  include 'header_nav.php';
?>
<div class="form_settings">
  <h2>Update Record</h2>
  <?php
     include 'connection.php';
     $user_id = mysqli_real_escape_string($conn, $_GET['id']);
     $sql = "SELECT * FROM user WHERE user_id = '{$user_id}'";
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
     if(mysqli_num_rows($squery) > 0){
       while($row = mysqli_fetch_assoc($squery)){
  ?>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="part p">
      <p><b>FIRST NAME</b></p>
      <input type="text" name="fname" value="<?php echo $row['FirstName']; ?>">
    </div>
    <div class="part p">
      <p><b>LAST Name</b></p>
      <input type="text" name="lname" value="<?php echo $row['LastName']; ?>">
    </div>
    <div class="part p">
      <p><b>USER NAME</b></p>
      <input type="text" name="username" value="<?php echo $row['Username']; ?>">
    </div>
    <div class="part p">
      <p><b>USER ROLE</b></p>
      <select name="user_role">
        <option value="" selected disabled>Select Your Role</option>
        <?php
           if($row['Role'] == 1){
             echo "<option value='1' selected>Admin User</option>";
             echo "<option value='1'>Normal User</option>";
           }else{
             echo "<option value='1'>Admin User</option>";
             echo "<option value='1' selected>Normal User</option>";
           }
        ?>
      </select>
    </div>
    <div class="part p">
      <p><b>BIO</b></p>
      <input type="text" name="bio" value="<?php echo $row['bio']; ?>" required>
    </div>
    <div class="part p">
      <p><b>ADDRESS</b></p>
      <input type="text" name="address" value="<?php echo $row['address']; ?>" required>
    </div>
    <div class="part p">
      <p><b>YOUR IMAGE</b></p>
      <input type="file" name="user-img" required>
      <input type="hidden" name="old-img" value="<?php echo $row['img']; ?>" required>
    </div>
    <div class="part part1 p1">
      <input type="submit" name="save" value="save">
    </div>
  </form>
  <?php
       }
     }
     if(isset($_POST['save'])){
       include 'connection.php';
       $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
       $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);
       $bio = mysqli_real_escape_string($conn, $_POST['bio']);
       $address = mysqli_real_escape_string($conn, $_POST['address']);

       if(empty($_FILES['user-img']['name'])){
         $file_name = $_POST['old-img'];
       }else{
         $errors = array();

         $file_name = $_FILES['user-img']['name'];
         $file_size = $_FILES['user-img']['size'];
         $file_type = $_FILES['user-img']['type'];
         $file_temp = $_FILES['user-img']['tmp_name'];
         $ext = explode(".",$file_name);
         $file_ext = end($ext);

         $extensions = ['jpg','png','jpeg'];
         if(in_array($file_ext,$extensions) === false){
           $errors[] = "This Extension is not Exeptable, Please try with this ext.(JPG,PNG,JPEG).";
         }

         if($file_size > 2097152){
           $errors[]  = "This File Size is not Exeptable, please try with less than 2MB file size.";
         }

         $new_name = time()."-".basename($file_name);
         $target = "user-img/".$new_name;
         $file_name = $new_name;

         if(empty($errors) == true){
           unlink("user-img/".$_POST['old-img']);
           move_uploaded_file($file_temp, $target);
         }else{
           print_r($errors);
           die();
         }
       }

       $sql1 = "UPDATE user SET FirstName = '{$first_name}',LastName = '{$last_name}',Username = '{$username}',
                Role = '{$user_role}',bio = '{$bio}',address = '{$address}',img = '{$file_name}'
                WHERE user_id = '{$user_id}'";
       $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select");
       header("location: {$location}/users.php");
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
