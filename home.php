<?php
session_start();

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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
	<head>
		<title>
			My Page
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" type="text/css">
		<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript">
</script>
		<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js" type="text/javascript">
</script>
	</head>
	<body>
		<div data-role="page" id="home" data-theme="a">
			<div data-role="header">
				<center>
					<h2>
						<!--a href="home.php"-->Jadual Pemakanan
					</h2>
				</center>
				<div data-role="navbar" data-theme="e">
					<div style="margin-left: 2em">
						<center>
							<ul>
								<li>
									<a href="home.php"><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSyytkSMLZQe-tjZAyTYB0tqA83Is2xUds6yd6fH2ZtkDztjJrXiA" width="120" height="120"></a>
								</li>
							</ul>
						</center>
					</div>
				</div>
			</div>
			<div data-role="content" data-theme="a">
				<ul data-role="listview">
					<li>
						<a href="jadualform.php"><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSyytkSMLZQe-tjZAyTYB0tqA83Is2xUds6yd6fH2ZtkDztjJrXiA" width="120" height="120">Isi Jadual</a>
					</li>
					<li>
						<a href="jaduallist.php"><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSyytkSMLZQe-tjZAyTYB0tqA83Is2xUds6yd6fH2ZtkDztjJrXiA" width="120" height="120">List Jadual</a>
					</li>
					<li style="list-style: none">
						<center>
							<a href="logout.php" data-role="button" data-theme="b" data-inline="true">Logout</a>
						</center>
					</li>
				</ul>
			</div>
			<div data-role="footer" data-theme="b">
				<div data-role="navbar" data-theme="c">
					<ul>
						<li>
							<a href="home.php" data-icon="home">Home</a>
						</li>
						<li>
							<a href="jaduallist.php" data-icon="grid">List</a>
						</li>
						<li>
							<a href="#" data-icon="info">About Us</a>
						</li>
					</ul>
				</div>
			</div>
			<center>
				<p class="copyright">
					© 2016 &nbsp;&nbsp;Jadual Pemakanan
				</p>
			</center>
		</div>
	</body>
</html>
