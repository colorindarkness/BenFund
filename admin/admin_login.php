<?php
session_start();
$id = $_POST['adminid'];
$pw_encrypt = $_POST['adminpw'];
//$pw_encrypt = sha1($pw);
//connect to benfund db
mysql_connect("localhost", "benfund", "pr0m3th3u$") or die(mysql_error());
mysql_select_db("benfund") or die(mysql_error());

//Checks For Activated Account
$query = "select * from admin where id = '$id' AND password = '$pw_encrypt'";
$results = mysql_query($query) or die(mysql_error());
$num_rows = mysql_num_rows($results);

if ($num_rows > 0) {
//register user info in session
$_SESSION['valid_admin'] = $id;
$_SESSION['adminpw'] = $pw_encrypt;
echo "<script>document.location.href='index.php'</script>";
}
else
 { $_SESSION['error'] = "Could not log you in. <br>Please try again<br>";
  header('Location:login.php');}
?>
