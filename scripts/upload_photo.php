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
				<div class="smalltext" style="padding:13px;"><strong>April 21, 2007</strong></div>
			</div>
			<div id="topbar">
				<div align="right" style="padding:12px;" class="smallwhitetext"><a href="#">Home</a> | <a href="#">Sitemap</a> | <a href="#">Contact Us</a></div>
			</div>
		</div>
		<div id="header" align="center">
			<div class="titletext" id="logo">
				<div class="logotext" style="margin:30px">Ca<span class="orangelogotext">$</span>h</div>
			</div>
			<div id="pagetitle">
				<div id="title" class="titletext" align="right">Welcome to Cash! <?php echo $user01->getFullName(); ?></div>
			</div>
		</div>
		<div id="content" align="center">
			<div id="menu" align="right">
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_topshadow.gif" width="189" height="8" alt="mnutopshadow" /></div>
				<div id="linksmenu" align="center">
					<a href="home.php" title="Home">Home</a>
					<a href="getcash.php" title="About Us">Get Cash </a>
					<a href="viewcashprocess.php" title="About Us">View Cash </a>
					<a href="profile.php" title="Products">Profile</a>
					<a href="logout.php" title="Our Services">Logout</a>				</div>
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" /></div>
			</div>
		<div id="contenttext">
		  <div class="panel" align="justify">
				<p>Upload Profile Photo </p>				
				<form enctype="multipart/form-data" action="uploadphotoprocess.php" method="POST">
					Please choose your photo: <input name="uploaded" type="file" /><br />
					<input type="submit" value="Upload" />
				</form>
				<p>&nbsp;</p>
		  </div>
		  </div>
		</div>
		<div id="footer" class="smallgraytext" align="center">
			<a href="#">Home</a> | <a href="#">About Us</a> | <a href="#">Products</a> | <a href="#">Our Services</a> | <a href="#">Contact Us</a><br />
			Your Company Name &copy; 2007<br />
			<a href="http://www.winkhosting.com" title="Hosting Colombia">Hosting Colombia</a><br />
		</div>
	</div>
</body>
</html>
