<?php
$cc = "123456789123";
echo $cc.'<br>';
$hid = substr($cc, -4);
$ccnum = "XXXXXXXX".$hid;
echo $ccnum;
?>