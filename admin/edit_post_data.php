<?php

  include 'connection.php';
  $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
  $tital = mysqli_real_escape_string($conn, $_POST['tital']);
  $desc = mysqli_real_escape_string($conn, $_POST['desc']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);

  if(empty($_FILES['img']['name'])){
    $file_name = $_POST['old-img'];
  }else{
    $errors = array();

    $file_name = $_FILES['img']['name'];
    $file_size = $_FILES['img']['size'];
    $file_type = $_FILES['img']['type'];
    $temp_name = $_FILES['img']['tmp_name'];
    $ext = explode(".", $file_name);
    $file_ext = end($ext);

    $extension = ['jpg','png','jpeg'];
    if(in_array($file_ext, $extension) == false){
      $errors[] = "This Extension is not Exeptable, Please try with this ext.(jpg,png,jpeg).";
    }

    if($file_size > 2097152){
      $errors[] = "This File Size is not Exeptable, please try with less than 2MB file size.";
    }

    $new_name = time()."-".basename($file_name);
    $target = "images/".$new_name;
    $file_name = $new_name;

    if(empty($errors) == true){
      unlink("images/".$_POST['old-img']);
      move_uploaded_file($temp_name, $target);
    }else{
      print_r($errors);
      die();
    }
  }

  $date = date("d M, Y");
  session_start();
  $author = $_SESSION['user_id'];

  $sql = "UPDATE post SET tital = '{$tital}', description = '{$desc}', category = '{$category}', post_date = '{$date}', author = '{$author}', images = '{$file_name}'
          WHERE post_id = '{$post_id}'";
  $squery = mysqli_query($conn, $sql) or die("Error in Query : update");

  if($_POST['category_id'] != $_POST['category']){
    $sql1 = "UPDATE category SET post = (post-1) WHERE category_id = {$_POST['category_id']};";
    $sql1 .= "UPDATE category SET post = (post+1) WHERE category_id = {$_POST['category']}";
    $squery1 = mysqli_multi_query($conn, $sql1) or die("Error in Query : select1");
  }
  header("location: {$location}/post.php");

?>
