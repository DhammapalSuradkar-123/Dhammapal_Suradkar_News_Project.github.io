<?php

  include 'connection.php';
  $website_name = mysqli_real_escape_string($conn, $_POST['website_name']);
  $footerDesc = mysqli_real_escape_string($conn, $_POST['Description']);

  if(empty($_FILES['logo']['name'])){
    $file_name = $_POST['old-logo'];
  }else{
    $errors = array();

    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_type = $_FILES['logo']['type'];
    $file_temp = $_FILES['logo']['tmp_name'];
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
      unlink("user-img/".$_POST['old-logo']);
      move_uploaded_file($file_temp, $target);
    }else{
      print_r($errors);
      die();
    }
  }

  $sql = "UPDATE settings SET website_name = '{$website_name}', website_logo = '{$file_name}', FooterDesc = '{$footerDesc}'";
  $squery = mysqli_query($conn,$sql) or die("Error in Query : update");
  header("location: {$location}/settings.php");
?>
