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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>Cash - user profile</title>
</head>
<body>
	<div id="page" align="center">
		<div id="toppage" align="center">
			<div id="date">
				<div class="smalltext" style="padding:13px;"></div>
			</div>
			<div id="topbar">
				
			</div>
		</div>
		<div id="header" align="center">
			<div class="titletext" id="logo">
				<div class="logotext" style="margin:30px"></div>
			</div>
				<?php include 'title.php' ?>
		</div>
		<div id="content" align="center">
			<div id="menu" align="right">
				<?php include 'menu.php';?>
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" /></div>
			</div>
		<div id="contenttext">
		  <div class="panel" align="justify">
				<p>User Profile </p>
				<form method="post" action="changepassword.php">
				<table width="466" border="1">
				  <tr>
                    <th width="83" scope="row"><div align="left">Photo</div></th>
                    <td width="367">&nbsp;<img src="images/<?php echo $user01->getUserImage(); ?>" /><br />
                      <br />
                      Click <a href="upload_photo.php">here</a> to upload photo </td>
                  </tr>
                  <tr>
                    <th width="83" scope="row"><div align="left">Login</div></th>
                    <td width="367">&nbsp;<?php echo $user01->getUserLogin(); ?></td>
                  </tr>
                  <tr>
                    <th scope="row"><div align="left">Password</div></th>
                    <td>Old Password:&nbsp;<?php echo $user01->getUserPassword(); ?><br />
                      New Password:&nbsp;<input type="text" name="password" />
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><div align="left">Full Name </div></th>
                    <td>&nbsp;<?php echo $user01->getFullName(); ?></td>
                  </tr>
                </table>
				<br />
				<label>
				<input name="Submit" type="submit" id="Submit" value="Change Password" />
				</label>
				</form>
				<p>&nbsp;</p>
		  </div>
		  </div>
		</div>
		
</body>
</html>
