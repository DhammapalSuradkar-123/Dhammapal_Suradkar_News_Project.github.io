<?php
   include 'connection.php';
   session_start();
   if(isset($_SESSION['username'])){
     header("location: {$location}/post.php");
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>USER LOGIN</title>
    <script src="https://kit.fontawesome.com/b159818ddd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style2.css">
  </head>
  <body>
    <div class="login-page">
      <div class="login">
        <a href="http://localhost:8012/My_Large_Project/cms_news_project/index.php"><span class="t_head">N</span>ews_Project</a>
        <h2>Admin Login</h2>
        <div class="a_login">
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="username">
              <i class="fas fa-user-alt"></i><input type="text" name="username" placeholder="username">
            </div>
            <div class="username">
              <i class="fas fa-lock"></i><input type="password" name="password" placeholder="password">
            </div>
            <input type="submit" name="login" value="Log-In" />
          </form>
          <?php
             if(isset($_POST['login'])){
               if(empty($_POST['username']) || empty($_POST['password'])){
                 echo '<div style="padding: 10px 0;background-color:#f8a5c2;color:red;">Username and Password are compalsory.</div>';
               }else{
                 include 'connection.php';
                 $username = mysqli_real_escape_string($conn,$_POST['username']);
                 $password = mysqli_real_escape_string($conn,md5($_POST['password']));

                 $sql = "SELECT user_id,Username,Role FROM user WHERE Username = '{$username}' AND password = '{$password}'";
                 $squery = mysqli_query($conn,$sql) or die("Query Failed.");

                 if(mysqli_num_rows($squery) > 0){
                   while($row = mysqli_fetch_assoc($squery)){
                     session_start();
                     $_SESSION['username'] = $row['Username'];
                     $_SESSION['user_id'] = $row['user_id'];
                     $_SESSION['role'] = $row['Role'];

                     header("location: {$location}/post.php");
                   }
                 }else{
                   echo '<div  style="padding: 10px 0;background-color:#f8a5c2;color:red;">Username and Password Dos Not Match.</div>';
                 }
               }
             }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
