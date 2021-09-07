<?php include 'header_nav.php'; ?>
<div class="post">
  <div class="p_sec1">
    <h2>All Post's</h2>
    <a href="add_post.php">ADD POST</a>
  </div>
  <?php
     include 'connection.php';
     if(isset($_GET['page'])){
       $page = mysqli_real_escape_string($conn, $_GET['page']);
     }else{
       $page = 1;
     }
     $limit = 5;
     $offset = ($page-1)*$limit;

     if($_SESSION['role'] == 1){
       $sql = "SELECT post.post_id,post.tital,post.post_date,category.category_name,user.Username,category.category_id
               FROM post LEFT JOIN category ON post.category = category.category_id
               LEFT JOIN user ON post.author = user.user_id
               ORDER BY post.post_id DESC
               LIMIT {$offset}, {$limit}";
     }else{
       $sql = "SELECT post.post_id,post.tital,post.post_date,category.category_name,user.Username,
               user.user_id,category.category_id
               FROM post LEFT JOIN category ON post.category = category.category_id
               LEFT JOIN user ON post.author = user.user_id
               WHERE user_id = {$_SESSION['user_id']}
               ORDER BY post.post_id DESC
               LIMIT {$offset}, {$limit}";
     }
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select1");

     if(mysqli_num_rows($squery) > 0){
  ?>
  <table>
    <thead>
      <tr>
        <th>SR.NO</th>
        <th class="tt">TITAL</th>
        <th>CATEGORY</th>
        <th>DATE</th>
        <th>AUTOR</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
      <?php
         $series = $offset + 1;
         while($row = mysqli_fetch_assoc($squery)){
      ?>
      <tr>
        <td><?php echo $series; ?></td>
        <td class="td"><?php echo $row['tital']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
        <td><?php echo $row['post_date']; ?></td>
        <td><?php echo $row['Username']; ?></td>
        <td><a href="edit_post.php?id=<?php echo $row['post_id']; ?>"><i class="fas fa-edit"></i></i></a></td>
        <td><a href="delete_post.php?cid=<?php echo $row['category_id']; ?>&id=<?php echo $row['post_id']; ?>"><i class="fas fa-trash"></i></a></td>
      </tr>
    <?php
        $series++;
        }
    ?>
    </tbody>
  </table>
  <?php }else{
           echo "Post is Not Available!.";
           die();
         }
  ?>
  <div id="pagination">
    <ul>
      <?php
        if($_SESSION['role'] == 1){
          $sql1 = "SELECT * FROM post";
        }else{
          $sql1 = "SELECT * FROM post WHERE author = {$_SESSION['user_id']}";
        }
        $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select2");
        $total_record = mysqli_num_rows($squery1);
        $total_page = ceil($total_record/$limit);
        if($page > 1){
          echo '<li><a href="post.php?page='.($page - 1).'">Prev</a></li>';
        }
        for($i = 1; $i <= $total_page; $i++){
          if($page == $i){
            $active = "active";
          }else{
            $active = "a";
          }
          echo '<li><a class='.$active.' href="post.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($page < $total_page){
          echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
        }
      ?>
    </ul>
  </div>
</div>
<div class="container footer footer_post">
  <?php
     $sql1 = "SELECT FooterDesc FROM settings";
     $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select");
     $row1 = mysqli_fetch_assoc($squery1);
  ?>
  <p><?php echo $row1['FooterDesc']; ?></p>
</div>
