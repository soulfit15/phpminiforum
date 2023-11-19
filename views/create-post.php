<?php
session_start();

?>

<!DOCTYPE html>
<html>
<title>My Input Page</title>
<head>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<?php include_once("navbar.php");?>
    <div class="create-container">
    <form method="post">
    <label>Title:</label>
    <br>
    <input type="text" name="title" placeholder="please enter the post title" maxlength="40" class="title">
    <br>
    <label>Content:</label>
    
    <br>
    <br>
    <textarea type="text" name="content" placeholder="insert post data here" class="content"></textarea>
    <br>
    <label>authored by:</label>

    <br>
    <label calss="author"><?php echo $_SESSION['authname']?></label>
    <br>
    <br>
    <input type="submit">

    <br>
</form>
</div>
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] = true) {
if (isset($_POST["title"]) && isset($_POST["content"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $author = $_SESSION['authname'];
    if ($title == null || $content == null || $author == null){
        echo '<script>alert("Please enter your data Correctly!!")</script>';
    } else {

    require_once '../Controller/config.php';

    $query = $mysqli->prepare('INSERT INTO posts (title, content, author) VALUES (?, ?, ?)');
    $query->bind_param('sss', $title, $content, $author);
    $result = $query->execute();
    if (!$result){
        die('Failed to insert data');
    } else {
        header('Location: ../index.php');
    }
    $mysqli->close();
    
    }
}
} else {
    header('Location: login.php');
    $_SESSION['var'] = 9;
}
?>
</body>
<style>
    div.create-container {
    display: flex;
    width: 30rem;
    background-color: #89CFF3;
    left: 15%;
    position: fixed;
    border-radius: 15px;
    padding-left: 20px;
    margin: 0;

}
.title {
    width: 28rem;
    float: left;
}
.content {
    height: 15rem;
    width: 28rem;
    border-radius: 15px;
    border-width: 0;
}
.author {
    color: white;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    float: right;
}
</style>
</html>
