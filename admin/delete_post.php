<?php
  include 'connection.php';
  $post_id = mysqli_real_escape_string($conn, $_GET['id']);
  $category_id = mysqli_real_escape_string($conn, $_GET['cid']);

  $sql = "SELECT images FROM post WHERE post_id = '{$post_id}'";
  $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
  $row = mysqli_fetch_assoc($squery);
  unlink("images/".$row['images']);

  $sql1 = "DELETE FROM post WHERE post_id = '{$post_id}';";
  $sql1 .= "UPDATE category SET post = (post - 1) WHERE category_id = '{$category_id}'";
  $squery1 = mysqli_multi_query($conn, $sql1) or die("Error in Query : update");
  header("location: {$location}/post.php");
?>
