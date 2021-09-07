<?php
  include 'connection.php';
  $category_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "DELETE FROM category WHERE category_id = '{$category_id}'";
  $squery = mysqli_query($conn, $sql) or die("Error in Query : delete");
  header("location: {$location}/category.php");
?>
