<?php
    session_start();
    echo "<link rel='stylesheet' href='../assets/style.css'>";
    include_once("navbar.php");
    $id=$_GET["id"];
//    echo "".$id."";
include_once '../Controller/config.php';
$query = $mysqli->prepare('SELECT title , content , author FROM posts WHERE id = ?');
$query->bind_param('i', $id);
$query->execute();
$query->bind_result($title, $content, $author);
if($query->fetch()){
echo '<br>';
echo '<br>';
echo '<div class="posts-container">';
echo '<h2>' . $title . '</h2>';
echo '<p>' . $content . '</p>';
echo '<h3>' . $author . '</h3>';
echo '</form>';
$query->close();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true && $_SESSION['authname'] === 'admin') {
    echo '<form method="post">';
    echo '<input type="submit" class="delete-btn" name="button1" value="Delete">';
    echo '</div>'; 

if($_POST['button1'] == 'Delete') { 
    $query = $mysqli->prepare('DELETE FROM posts WHERE id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    header("Location: ../index.php"); exit;
    if (!$query){
        echo "error deleting";
    }
}
}
?>
<style>

</style>
