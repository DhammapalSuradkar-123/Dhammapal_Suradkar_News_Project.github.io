<?php
  include 'connection.php';
  session_start();
  if(!isset($_SESSION['user_id'])){
    header("location: {$location}/index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User_Profile</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Unicase:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b159818ddd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>
    <section>
    <header>
      <?php
         $sql = "SELECT website_name FROM settings";
         $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
         $row = mysqli_fetch_assoc($squery);
      ?>
      <a href="http://localhost:8012/My_Large_Project/cms_news_project/index.php"><span class="t_head"><?php echo substr($row['website_name'],0,1); ?></span><?php echo substr($row['website_name'],1,30); ?></a>
    </header>
    <main>
      <?php
         $sql = "SELECT * FROM user WHERE user_id = {$_SESSION['user_id']}";
         $squery = mysqli_query($conn, $sql) or die("Error in Query : select");
         $row = mysqli_fetch_assoc($squery);
      ?>
      <div class="section s1">
      <div id="part1">
        <div class="user-edit">
          <a href="edit_user.php?id=<?php echo $_SESSION['user_id']; ?>"><i class="fas fa-user-edit"></i></a>
        </div>
        <div class="user-img">
          <img src="user-img/<?php echo $row['img']; ?>" alt="user-img">
        </div>
        <div class="user-name">
          <h2><?php echo $row['FirstName']." ".$row['LastName']; ?></h2>
          <p><?php echo $row['address']; ?></p>
        </div>
      </div>
      </div>
      <div class="section s2">
        <div class="contact">
          <p><i class="fas fa-phone-alt"></i> +91_2548798562</p>
          <p><i class="fas fa-envelope"></i> DhammapalSuradkar123@gmail.com</p>
        </div>
        <div class="bio">
          <h3>Bio</h3>
          <p><?php echo $row['bio']; ?></p>
        </div>
        <div class="follow">
          <button type="button" onclick="window.location.href = 'http://localhost:8012/My_Large_Project/cms_news_project/author.php?author=<?php echo $_SESSION['user_id']; ?>'"><i class="fas fa-comments"></i>Post's</button>
          <button type="button" class="button2">&#x2b; Follow</button>
          <button type="button" class="button3">&#8722; Unfollow</button>
        </div>
        <div class="review">
          <h3>4.5</h3>
          <div class="star">
            <p><i class="fas fa-star"></i></i><i class="fas fa-star"></i></i><i class="fas fa-star"></i></i><i class="fas fa-star"></i></i><i class="fas fa-star"></i></i></p>
            <p><b>123 reviews</b></p>
          </div>
          <div class="media">
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-instagram-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </main>
  </section>
  </body>
</html>
