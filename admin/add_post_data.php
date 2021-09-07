<?php
  include 'connection.php';
  $tital = mysqli_real_escape_string($conn, $_POST['tital']);
  $Desc = mysqli_real_escape_string($conn, $_POST['Description']);
  $cate = mysqli_real_escape_string($conn, $_POST['category']);

  $errors = array();
  $file_name = $_FILES['img']['name'];
  $file_size = $_FILES['img']['size'];
  $file_type = $_FILES['img']['type'];
  $temp_name = $_FILES['img']['tmp_name'];
  $ext = explode(".", $file_name);
  $file_ext = end($ext);

  $extensions = ["jpg","png","jpeg"];

  if(in_array($file_ext, $extensions) == false){
    $errors[] = "Sorry This File Extension is not allow. Please try with this ext.(JPG,PNG,JPEG)";
  }

  if($file_size > 2097152){
    $errors[] = "Sorry, This File Size is not accetable. Please try with less than 2MB file size.";
  }

  $new_name = time()."-".basename($file_name);
  $target = "images/".$new_name;
  $file_name = $new_name;

  if(empty($errors) == true){
    move_uploaded_file($temp_name, $target);
  }else{
    print_r($errors);
    die();
  }

  session_start();
  $author = $_SESSION['user_id'];
  $date = date("d M, Y");

  $sql = "INSERT INTO post (tital,description,category,post_date,author,images)
          VALUES ('{$tital}','{$Desc}','{$cate}','{$date}','{$author}','{$file_name}');";

  $sql .= "UPDATE category SET post = (post + 1) WHERE category_id = '{$cate}'";

  $squery = mysqli_multi_query($conn, $sql) or die("Error in Query : insert and update");
  header("location: {$location}/post.php");

?>
