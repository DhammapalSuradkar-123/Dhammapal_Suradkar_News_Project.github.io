<?php
  include 'header_nav.php';
?>
<div class="post">
  <div class="p_sec1">
    <h2>All User's</h2>
    <a href="add_users.php">ADD USER</a>
  </div>
  <?php
     include 'connection.php';
     if(isset($_GET['page'])){
       $page = $_GET['page'];
     }else{
       $page = 1;
     }
     $limit = 5;
     $offset = ($page-1)*$limit;

     $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT $offset, $limit";
     $squery = mysqli_query($conn, $sql) or die("Error in Query : select1");

     if(mysqli_num_rows($squery) > 0){
  ?>
  <table>
    <thead>
      <tr>
        <th>SR.NO</th>
        <th class="tt">FULL NAME</th>
        <th>USER NAME</th>
        <th>ROLE</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
    </thead>
    <tbody>
      <?php
         $series = $offset + 1;
         while($row = mysqli_fetch_assoc($squery)){
           if($row['Role'] == 1){
             $role = "Admin User";
           }else{
             $role = "Normal User";
           }
      ?>
      <tr>
        <td><?php echo $series; ?></td>
        <td class="td"><?php echo $row['FirstName']." ".$row['LastName']; ?></td>
        <td><?php echo $row['Username']; ?></td>
        <td><?php echo $role; ?></td>
        <td><a href="edit_user.php?id=<?php echo $row['user_id']; ?>"><i class="fas fa-edit"></i></i></a></td>
        <td><a href="delete_user.php?id=<?php echo $row['user_id']; ?>"><i class="fas fa-trash"></i></a></td>
      </tr>
      <?php
          $series++;
          }
     ?>
    </tbody>
  </table>
  <?php
     }else{
        echo "Record Not Found!.";
      }
  ?>
  <div id="pagination">
    <ul>
      <?php
         $sql1 = "SELECT * FROM user";
         $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select2");

         $total_record = mysqli_num_rows($squery1);
         $total_page = ceil($total_record/$limit);
         if($page > 1){
           echo '<li><a href="users.php?page='.($page - 1).'">Prev</a></li>';
         }
         for($i = 1; $i <= $total_page; $i++){
           if($page == $i){
             $active = "active";
           }else{
             $active = "a";
           }
           echo '<li><a class='.$active.' href="users.php?page='.$i.'">'.$i.'</a></li>';
         }
         if($page < $total_page){
           echo '<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
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
