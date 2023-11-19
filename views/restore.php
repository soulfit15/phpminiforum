<?php 
if (isset($_POST['restore_email']) && isset($_POST['restore_name'])) {
$restname = $_POST['restore_name'];
$restore_email = $_POST['restore_email'];
include_once('../Controller/config.php');   

$query = $mysqli->prepare('SELECT id , email FROM users WHERE username = ?');
$query ->bind_param('s', $restname);
$query->execute();
$query->bind_result($userid, $truemail);
$query->fetch();
if ($restore_email === $truemail) {
         header('Location: ../views/retrieve.php?id=' . $userid);
        echo $truemail . ' = ' . $restore_email;
         exit;
     } else {
 
         echo '<script>alert("Please enter your data Correctly!!")</script>';        
     }
}
    

 ?>
<!DOCTYPE html>
<html>
<title>My login Page</title>
<head>
<link rel="stylesheet" href="../assets/style.css"></head>
<body class="body">
<?php include_once("navbar.php");?>
<div class="login-container">
    <form method="post">
        <label>Insert your mail:</label>
        <input type="text" maxlength="40" placeholder="insert your mail" class="registerfield" name="restore_email">
        <label for=""> Insert your username:</label>
        <input type="text" name="restore_name" id="" maxlength="20" class="registerfield">
        <input type="submit" id="restorebtn" value="Restore">
    </form>
</div>
<style>
    #restorebtn {
    border-width: 0;
    border-radius: 15px;
    width: 90%;
    height: 20%;
    margin: 0.5rem;
    margin-bottom: 5rem;
}

</style>
</html>