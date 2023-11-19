<?php

session_start();
if (isset($_POST["usrname"]) && isset($_POST["usrpass"])) {
    $usrpass = $_POST['usrpass'];
    
    
    $usrname = $_POST["usrname"];
    if ($usrname == '' || $usrpass == ''){
        echo '<script>alert("Please enter your data Correctly!!")</script>';
    } 
    include_once('../Controller/config.php');   
 
    $query = $mysqli->prepare('SELECT password FROM users WHERE username = ?');
        $query->bind_param('s', $usrname);
        $query->execute();
        $query->bind_result($truepass);
        $query->fetch();
        if (password_verify($usrpass, $truepass) ){
        $_SESSION['loggedin'] = true;
        $_SESSION['authname'] = $tusrname;
        header('Location: create-post.php');
        $database->close();
        exit();

        } else {
            die('wrong credentials!!!');
        }
       /** $passcheck = password_verify($usrpass, $truepass);
       * if ($usrname === $truename && password_verify($usrpass, $truepass)){
        *    echo $truepass;
         *   
        *    $_SESSION['loggedin'] = true;
        *    
        *} else {
        *    die('wrong credentials!!!');
        *}
        */

    
}


?>
<?php 
;?>

<!DOCTYPE html>
<html>
<title>My login Page</title>
<head>
<link rel="stylesheet" href="../assets/style.css"></head>
<body class="body">
<?php include_once("navbar.php");?>
    <div class="login-container">
    <form method="post">
    <label>username</label>
    <br>
    <input type="text" name="usrname" placeholder="please enter your username" maxlength="40" class="login-name">
    <br>
    <label>password</label>
    
    <br>
    <input type="password" name="usrpass" placeholder="password" class="login-pass">
    <br>
    <a href="restore.php" class="restore-label">Forgot password?</a>
    <br>
    <br>
    <input type="submit" class="login-submit">
    <br>
    <br>
    <br>
    <br>
</form>
</div>
<?php

?>
</body>
<style>

</style>
</html>
