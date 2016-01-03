<?php
session_start();

//include the DB connections details here
include("db.php");

$sql="INSERT INTO jadual (datestart,timestart, quantity,jenisubat)
      VALUES
      ('$_POST[datestart]',  '$_POST[timestart]','$_POST[quantity]', '$_POST[jenisubat]')";

if (!mysql_query($sql,$con))
{
   //should redirect user to the proper webpage here with the same css template
   die('Error: ' . mysql_error());
}

//redirect to the register_done page;
$to = 'jadualform.php';
header('Location: '. $to);
mysql_close($con);
exit;
?>