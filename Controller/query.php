<?php 
if (isset($_POST['newpass']) && isset($_POST['repeatpass'])) {
$newpass = $_POST['newpass'];
$repeatpass = $_POST['repeatpass'];

$db = new SQLite3($_SERVER['DOCUMENT_ROOT'] . '/database/database.db');
$query = $db->prepare('INSERT INTO users(password) VALUES :pass WHERE email = :email ');
$result = $query->execute();
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $trueEmail === $row['email'];
    echo $trueEmail;
    if ($trueEmail === $restore_email) {
        header('Location: ../views/retrieve.php');
        exit;
    } else {
        die('Wrong Credentials, please remember your email first!!');
        
    }
}
}