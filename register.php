<?php
session_start();

//include the DB connections details here
include("db.php");

$sql="INSERT INTO user (login, password, usertype, fullname, image)
      VALUES
      ('$_POST[login]', '$_POST[password]', 'client', '$_POST[fullname]', 'default.jpg')";

if (!mysql_query($sql,$con))
{
   //should redirect user to the proper webpage here with the same css template
   die('Error: ' . mysql_error());
}

//redirect to the register_done page;
$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['fullname'] = $_POST['fullname'];

$to = 'registerresult.php';
header('Location: '. $to);
mysql_close($con);
exit;
?>