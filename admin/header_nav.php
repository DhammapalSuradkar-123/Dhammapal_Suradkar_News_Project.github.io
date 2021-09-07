<?php
   include 'connection.php';
   session_start();
   if(!isset($_SESSION['username'])){
      header("location: {$location}/index.php");
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-top-fit=no">
    <title>ADMIN_PANEL</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b159818ddd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>
    <div class="container">
      <div class="head">
        <?php
           include 'connection.php';
           $sql = "SELECT website_name FROM settings";
           $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
           $row = mysqli_fetch_assoc($squery);
        ?>
        <a href="http://localhost:8012/My_Large_Project/cms_news_project/"><span class="t_head"><?php echo substr($row['website_name'],0,1); ?></span><?php echo substr($row['website_name'],1,30); ?></a>
        <div class="log">
          <span class="username">Hello, <?php echo $_SESSION['username']; ?></span>
          <a href="user_page.php"><i class="fas fa-user-tie"></i></a>
          <a href="log-out.php">Log-Out</a>
        </div>
      </div>
      <div class="navbar">
        <ul id="list">
          <div class="link-1">
          <li id="first"><a class="list-item" href="post.php">POST</a></li>
          <?php
             if($_SESSION['role'] == 1){
          ?>
          <div id="hidelinks">
            <li><a class="list-item" href="category.php">CATEGORY</a></li>
            <li><a class="list-item" href="users.php">USER</a></li>
            <li><a class="list-item" href="settings.php">SETTINGS</a></li>
          </div>
          </div>
          <div class="bar" onclick="clickfun(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div>
          <?php } ?>
        </ul>
      </div>
    </div>
    <script>
      function clickfun(a){
        a.classList.toggle("change");

        var b = document.getElementById("hidelinks");
        if(b.style.display === "block"){
          b.style.display = "none";
        }else{
          b.style.display = "block";
        }
      }
    </script>
  </body>
</html>
