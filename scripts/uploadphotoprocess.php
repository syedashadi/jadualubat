<?php
session_start();

//include the DB connections details here
include("db.php");

class User 
{
    var $userLogin;
    var $userPassword;
    var $fullName;	
	var $userType;
	var $userImage;

    function User()
    {
    }
    
    function setUserLogin($value)
    {
        $this->userLogin=$value;
    }
    
    function getUserLogin()
    {
        return $this->userLogin;
    }
    
    function setUserPassword($value)
    {
        $this->userPassword=$value;
    }
    
    function getUserPassword()
    {
        return $this->userPassword;
    }   
	
    function setFullName($value)
    {
        $this->fullName=$value;
    }
    
    function getFullName()
    {
        return $this->fullName;
    }   
	
    function setUserType($value)
    {
        $this->userType=$value;
    }
    
    function getUserType()
    {
        return $this->userType;
    }   	
	
    function setUserImage($value)
    {
        $this->userImage=$value;
    }
    
    function getUserImage()
    {
        return $this->userImage;
    }   	
}

//get session data first for page authentication
if (!isset($_SESSION['user']))
{
  //redirect to terminate.html
  //access violation of page
  $to = "terminate.html";

  header('Location: '. $to);
  exit;
}

// get user/customer profile from session
$user01 = $_SESSION['user'];
$login = $user01->getUserLogin();

$target = "images/";
$target = $target . $login . "_" . basename( $_FILES['uploaded']['name']) ;
$filename = $login . "_" . basename( $_FILES['uploaded']['name']); 
$uploaded_type = $_FILES['uploaded']['type'];
$uploaded_size = $_FILES['uploaded']['size'];

$ok=1;

//This is our size condition
if ($uploaded_size > 350000)
{
  echo "Your file is too large.<br>";
  $ok=0;
}

//This is our limit file type condition - no PHP
if ($uploaded_type =="text/php")
{
  echo "No PHP files<br>";
  $ok=0;
}

if (!($uploaded_type=="image/gif") && !($uploaded_type=="image/jpeg")) 
{
  echo "You may only upload GIF files or JPEG files only.<br>" . basename( $_FILES['uploaded']['name']) . "<br>";
  echo $uploaded_type . "<br>";
  $ok=0;
}

//Here we check that $ok was not set to 0 by an error
if ($ok==0)
{
  echo "Sorry your file was not uploaded";
}
//If everything is ok we try to upload it
else
{
  //insert to DB
  $sql = "UPDATE user SET image = '$filename'" .
	     " WHERE LOGIN = '$login'";

  if (!mysql_query($sql,$con))
  {
    //should show proper error here and redirect user to his profile.php page
    die('Error: ' . mysql_error());
  }
  
  if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
  {
    //change user session profile
	$user01->setUserImage($filename);
    
	//put user data in session
    $_SESSION['user'] = $user01;
	
	// redirect to profile
	$to = 'profile.php';
	header('Location: '. $to);
    mysql_close($con);
    exit;
  }
  else
  {
    echo "Sorry, there was a problem uploading your file from <br />" . $_FILES['uploaded']['tmp_name'] . " to " . $target;
	echo "<br />" . $_FILES['uploaded']['error'];
  }
}
?>