
<?php session_start();?>

<!DOCTYPE html>
<html>
<title>My Register Page</title>
<head>

<link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<?php include_once($_SERVER['DOCUMENT_ROOT'] . "/views/navbar.php");?>

    <div class="new-container">
    <form method="post">
    <br>
    <label>Name:</label>
    <br>
    <input type="text" name='usrnamename' placeholder="please enter your name" class='registerfield'>
    <br>
    <br>
        <label>Email:</label>
        <br>
    <input type="text" name="usremail"placeholder="Please enter your email" maxlength="40" class='registerfield'>
    <br>
    <br>
    <label>username:</label>
<br>
    <input type="text" name="usrname" placeholder="please enter your username" maxlength="40" class='registerfield'>
    <br>
    <br>
    <label>password:</label>
    <br>
    <input type="password" name="usrpass" placeholder="password" class='registerfield'>
    <br>
    <br>
    <input type="submit" class="reg-submit" value="Register">

    <br>
</form>
</div>
</body>
<?php
if (isset($_POST["usrname"]) && isset($_POST["usrpass"]) && isset($_POST['usrnamename']) && isset($_POST['usremail'])) {
    $usrpass = password_hash($_POST["usrpass"], PASSWORD_DEFAULT);
    $usrname = $_POST["usrname"];
    $usrnamename = $_POST["usrnamename"];
    $usremail = $_POST["usremail"];
    if ($usrname == null || $usrpass == null || $usrnamename == null || $usremail == null) {
        echo '<script>alert("Please enter your data Correctly!!")</script>';
        exit();
    } else {

        require_once('../Controller/config.php');
    $stmt = $mysqli->prepare('INSERT INTO users (username, password, email, name) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $usrname, $usrpass, $usremail, $usrnamename);

    $stmt -> execute();
    if (!$stmt){
        echo '<script>alert("Couldnot insert to database")</script>';
        
    } else {
        $_SESSION['loggedin'] = true;
        $_SESSION['authname'] = $usrname;
        ob_start();
        header("Location: http://localhost/");
        $database->close();
        exit(); 

        
    }
    }
    
}

?>

</html>
