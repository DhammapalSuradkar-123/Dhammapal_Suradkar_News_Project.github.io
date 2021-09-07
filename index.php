<?php include 'header_nav.php' ?>
<div class="container">
  <div class="row">
    <div class="main1">
      <?php
         include 'connection.php';
         if(isset($_GET['page'])){
           $page = mysqli_real_escape_string($conn, $_GET['page']);
         }else{
           $page = 1;
         }
         $limit = 4;
         $offset = ($page-1)*$limit;
         $sql = "SELECT post.post_id,post.tital,post.description,post.post_date,post.images,
                 category.category_name,user.Username,category.category_id,user.user_id
                 FROM post LEFT JOIN category ON post.category = category.category_id
                 LEFT JOIN user ON post.author = user.user_id
                 ORDER BY post.post_id DESC
                 LIMIT {$offset}, {$limit}";
         $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
         if(mysqli_num_rows($squery) > 0){
           while($row = mysqli_fetch_assoc($squery)){
      ?>
      <div class="m1_section1">
        <div class="sec1">
          <a href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/images/<?php echo $row['images']; ?>"></a>
        </div>
        <div class="sec2">
          <a class="tital" href="single.php?id=<?php echo $row['post_id']; ?>"><?php echo $row['tital']; ?></a>
          <div class="content">
            <a href="category.php?category=<?php echo $row['category_id']; ?>"><i class="fas fa-tags"></i><?php echo $row['category_name']; ?></a>
            <a href="author.php?author=<?php echo $row['user_id']; ?>"><i class="fas fa-user-edit"></i><?php echo $row['Username']; ?></a>
            <p><i class="far fa-calendar-alt"></i><?php echo $row['post_date']; ?></p>
          </div>
          <p><?php echo substr($row['description'],0,150)."..........."; ?></p>
          <button onclick="window.location.href='single.php?id=<?php echo $row['post_id']; ?>'">Read More</button>
        </div>
      </div>
      <hr>
      <?php
           }
         }
      ?>
      <div id="pagination">
        <ul>
          <?php
            $sql1 = "SELECT * FROM post";
            $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select2");
            $total_record = mysqli_num_rows($squery1);
            $total_page = ceil($total_record/$limit);
            if($page > 1){
              echo '<li><a href="index.php?page='.($page-1).'">Prev</a></li>';
            }
            for($i = 1; $i <= $total_page; $i++){
              if($i == $page){
                $active = "active";
              }else{
                $active = "a";
              }
              echo '<li><a class='.$active.' href="index.php?page='.$i.'">'.$i.'</a></li>';
            }
            if($page < $total_page){
              echo '<li><a href="index.php?page='.($page+1).'">Next</a></li>';
            }
          ?>
        </ul>
      </div>
    </div>
    <div class="main2">
      <div class="m2_section1">
        <h3>SEARCH</h3>
        <?php include 'search.php' ?>
      </div>
      <div class="m2_section2">
        <h3>RECENT POSTS</h3>
        <?php include 'sidebar.php' ?>
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
