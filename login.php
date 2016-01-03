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

//check if the user exist in DB
$sql = "SELECT * FROM user WHERE login = '$_POST[login]'" .
	   " AND password = '$_POST[password]'";
						 
$user_data = mysql_query($sql, $con);                                            
$row = mysql_fetch_array($user_data); 

if (empty($row['login']))
{
  //redirect to registration page    
  $to = 'not-exist.html';
  header('Location: '. $to);
  exit;
}

//put user data in Model (User Object)
$user01 = new User();
$user01->setUserLogin($row['login']);
$user01->setUserPassword($row['password']);
$user01->setFullName($row['fullname']);
$user01->setUserType($row['usertype']);
$user01->setUserImage($row['image']);

//put user data in session
$_SESSION['user'] = $user01;

//redirect to the HOME page
$to = 'home.php';
header('Location: '. $to);
mysql_close($con);
exit;
?>