<?php 
$id = $_GET['id'];
if (isset($_POST['newpass']) && isset($_POST['repeatpass'])) {
$newpass = $_POST['newpass'];
$repeatpass = $_POST['repeatpass'];
if ($newpass === $repeatpass) {
require_once '../Controller/config.php' ;
$passhash = password_hash($newpass, PASSWORD_DEFAULT);
$query = $mysqli->prepare('UPDATE users SET password = ? WHERE id = ? ');
$query->bind_param('si', $passhash, $id);
$result = $query->execute();
if (!$result) {
    die('error updating data!');
} else {
    die('successful enter!');
}
} else {
    die('error password not equal!');
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
        <label>Insert your new password:</label>
        <input type="password" maxlength="20" placeholder="insert your password" class="registerfield" name="newpass">
        <label for=""> re-enter your password:</label>
        <input type="password" name="repeatpass" id="" maxlength="20" class="registerfield">
        <input type="text" class="registerfield" name="restore-mail" id="" placeholder="<?php echo $id; ?>" disabled>
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