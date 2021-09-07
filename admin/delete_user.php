<?php
  include 'connection.php';
  $user_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "DELETE FROM user WHERE user_id = '{$user_id}'";
  $squery = mysqli_query($conn, $sql) or die("Error in Query : delete");
  header("location: {$location}/users.php");
?>
