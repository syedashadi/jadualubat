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
$results= mysql_query("select * from jadual order by id desc");
?>
<!DOCTYPE html> 
<html> 
<head> 
	<title>My Page</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
</head> 
<body> 

<div data-role="page" id="pageone" data-theme="a">
	<div data-role="header" >
		<a href="home.php" data-icon="home" data-role="button" data-iconpos="right">Home</a>
		<h1>Jadual Pemakanan Ubat</h1>
	</div><!-- /header -->
  <div data-role="main" class="ui-content">
    <h2>Listing :</h2>
   <ul data-role="listview" data-filter="true" data-input="#myFilter" data-autodividers="true" data-inset="true">
       <?php
	 while($arrrec = mysql_fetch_array($results))
		  {  
echo"<li><a href=jaduallist_details.php?id=$arrrec[id]>"."Date : ".$arrrec['datestart']." | Jenis Ubat : ".$arrrec['jenisubat']."  | Kuantiti: ".$arrrec['quantity']."</li>"."</a>";

		  }
	      ?>
		  <a href="home.php" data-role="button" data-theme="b" data-inline="false">Back</a></div>
	<!-- /page -->
	<div data-role="footer" data-theme="b">
			<div data-role="navbar" data-theme="c">
	            <ul>
	                <li><a href="home.php"  data-icon="home">Home</a></li>
	                <li><a href="jaduallist.php" data-icon="grid">List</a></li>
	                <li><a href="#" data-icon="info">About Us</a></li>
	            </ul>
	        </div>
		</div>
	<center><p class="copyright">&copy; 2016 &nbsp;&nbsp;Jadual Pemakanan</p></center>
	</div>
  </div>
</div> 

</body>
</html>
