<?php
  if(isset($_SERVER['PHP_SELF'])){
    include 'connection.php';
    $file_name = basename($_SERVER['PHP_SELF']);

    switch($file_name){
      case "category.php": $cate_id = mysqli_real_escape_string($conn, $_GET['category']);
                           $sql2 = "SELECT category_name FROM category WHERE category_id = {$cate_id}";
                           $squery2 = mysqli_query($conn, $sql2) or die("Error in Query : select1");
                           $row2 = mysqli_fetch_assoc($squery2);
                           $page_title = $row2['category_name']." News"; break;

      case "author.php":   $author_id = mysqli_real_escape_string($conn, $_GET['author']);
                           $sql2 = "SELECT Username FROM user WHERE user_id = {$author_id}";
                           $squery2 = mysqli_query($conn, $sql2) or die("Error in Query : select2");
                           $row2 = mysqli_fetch_assoc($squery2);
                           $page_title = "News By : ".$row2['Username']; break;

      case "single.php":   $post_id = mysqli_real_escape_string($conn, $_GET['id']);
                           $sql2 = "SELECT tital FROM post WHERE post_id = {$post_id}";
                           $squery2 = mysqli_query($conn, $sql2) or die("Error in Query : select3");
                           $row2 = mysqli_fetch_assoc($squery2);
                           $page_title = "post : ".$row2['tital']; break;

      case "search_result.php":   $page_title = "search_query : ".$_GET['search']; break;

      default : $page_title = "Home Page";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-top-fit=no">
    <title><?php echo $page_title; ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b159818ddd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style1.css">
  </head>
  <body>
    <div class="container">
      <div class="head">
        <?php
           include 'connection.php';
           $sql = "SELECT website_name FROM settings";
           $squery = mysqli_query($conn, $sql) or die("Error in Query : select1");
           $row = mysqli_fetch_assoc($squery);
        ?>
        <a href="http://localhost:8012/My_Large_Project/cms_news_project/index.php"><span class="t_head"><?php echo substr($row['website_name'],0,1); ?></span><?php echo substr($row['website_name'],1,30); ?></a>
        <div class="log">
          <?php
             session_start();
             if(isset($_SESSION['user_id'])){
               echo "<a class='panel' href='http://localhost:8012/My_Large_Project/cms_news_project/admin/post.php'><i class='fa fa-users-cog'></i></a>";
               echo "<a href='http://localhost:8012/My_Large_Project/cms_news_project/admin/log-out.php'>Log-Out</a>";
             }else{
               echo '<a href="http://localhost:8012/My_Large_Project/cms_news_project/admin/index.php">Log-In</a>';
             }
          ?>
        </div>
      </div>
      <div class="navbar">
        <ul class="list" id="nav">
          <li><a href="index.php">HOME</a></li>
          <li class="dropdown">
            <a href="#">CATEGORYS &#x25BE;</a>
            <div class="dropdown-content">
              <?php
                 $sql1 = "SELECT * FROM category";
                 $squery1 = mysqli_query($conn, $sql1) or die("Error in Query : select2");
                 if(mysqli_num_rows($squery1) > 0){
                   while($row1 = mysqli_fetch_assoc($squery1)){
                     if($row1['post'] > 0){
                       echo '<a href="category.php?category='.$row1['category_id'].'">'.$row1['category_name'].'</a>';
                     }
                   }
                 }
              ?>
              <script>
                window.onscroll = function(){scrollfun()};
                var navbar = document.getElementById("nav");
                var sticky = navbar.offsetTop;
                function scrollfun(){
                  if(window.pageYOffset >= sticky){
                    navbar.classList.add("sticky");
                  }else{
                    navbar.classList.remove("sticky");
                  }
                }
              </script>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>
