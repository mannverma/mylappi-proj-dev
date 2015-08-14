<?php
if(!isset($_COOKIE['admin']))
{
	header('location:index.php');
}
else
{
$admin=$_COOKIE['admin'];
$qr=mysql_query("select status from admin_users where name_user='$admin'");
$row=mysql_fetch_array($qr);
$adminstatus=$row[0];
}
?>