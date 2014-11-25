<?
// *************************
// Random Password Generator
// *************************
$totalChar = 7; // number of chars in the password
$salt = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";  // salt to select chars from
srand((double)microtime()*1000000); // start the random generator
$randpass=""; // set the inital variable
for ($i=0;$i<$totalChar;$i++)  // loop and create password
$randpass = $randpass . substr ($salt, rand() % strlen($salt), 1);
?>