<?php include 'header_nav.php' ?>
<div class="container">
  <div class="row">
    <?php
       include 'connection.php';
       $post_id = mysqli_real_escape_string($conn, $_GET['id']);
       $sql = "SELECT post.tital,post.description,post.post_date,post.images,category.category_name,user.Username
               FROM post LEFT JOIN category ON post.category = category.category_id
               LEFT JOIN user ON post.author = user.user_id
               WHERE post.post_id = {$post_id}";
       $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
       if(mysqli_num_rows($squery) > 0){
         while($row = mysqli_fetch_assoc($squery)){
    ?>
    <div class="main3">
      <h1><?php echo $row['tital']; ?></h1>
      <div class="s_content">
        <a href="#"><i class="fas fa-tags"></i><?php echo $row['category_name']; ?></a>
        <a href="#"><i class="fas fa-user-edit"></i><?php echo $row['Username']; ?></a>
        <p><i class="far fa-calendar-alt"></i><?php echo $row['post_date']; ?></p>
      </div>
      <div class="s_img">
        <img src="admin/images/<?php echo $row['images']; ?>">
      </div>
      <p><?php echo $row['description']; ?></p>
    </div>
    <?php
          }
        }
    ?>
    <div class="main2">
      <div class="m2_section1">
        <h3>SEARCH</h3>
        <?php include 'search.php'; ?>
      </div>
      <div class="m2_section2">
        <h3>RECENT POSTS</h3>
        <?php include 'sidebar.php'; ?>
      </div>
    </div>
  </div>
</div>
<div class="container footer">
  <?php
     $sql1 = "SELECT FooterDesc FROM settings";
     $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select");
     $row1 = mysqli_fetch_assoc($squery1);
  ?>
  <p><?php echo $row1['FooterDesc']; ?></p>
</div>
