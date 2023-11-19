<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="/assets/style.css">
    <head>
            </head>

    <body>
<?php 
    include_once(__DIR__ . '/views/navbar.php');    
?>

        <div class="main">
        <div class="login-reg-btn">
        <?php if (isset($_SESSION["loggedin"]) != true) {
            echo '<a href="/views/register.php" class="login-btn">Register</a>';
            echo    '<a href="/views/login.php" class="login-btn">Login</a>';
        } else if ($_SESSION['loggedin'] = 'true') {
            echo '<a href="/Controller/LogoutController.php">Logout</a>';

        }
         ?>
        
        </div>
        <h1>Welcome to my site</h1>
       
</div>
<?php
include_once 'Controller/config.php';
$result = mysqli_query($mysqli,'SELECT * FROM posts');
while ($rows = $result->fetch_assoc()) {
    $title = $rows['title'];
    $content = $rows['content'];
    $author = $rows['author'];
    $id = $rows['id'];
echo '<br>';
echo '<br>';
echo '<div class="posts-container">';
echo "<a href='/views/post.php?id=$id' class='postlink'>" . $title . "</a>";
echo '</div>';
}
?>
    </body>

</html>
