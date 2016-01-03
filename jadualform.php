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
<!DOCTYPE html> 
<html> 
<head> 
	<title>My Page</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="http://cdn.jtsage.com/jtsage-datebox/4.0.0/jtsage-datebox-4.0.0.bootstrap.min.css" />
    <link rel="stylesheet" href="http://dev.jtsage.com/DateBox/css/syntax.css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://cdn.jtsage.com/external/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="http://dev.jtsage.com/DateBox/js/doc.js"></script>
    <script type="text/javascript" src="http://cdn.jtsage.com/jtsage-datebox/4.0.0/jtsage-datebox-4.0.0.bootstrap.min.js"></script>
    <script type="text/javascript" src="http://cdn.jtsage.com/jtsage-datebox/i18n/jtsage-datebox.lang.utf8.js"></script>
    <script type="text/javascript">
    jQuery.extend(jQuery.jtsage.datebox.prototype.options,
    {
      'useLang': 'en'
    });
    </script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
</head> 
<body> 

<div data-role="page" data-theme="a">

	<div data-role="header" >
		<a href="home.php" data-icon="home" data-role="button" data-iconpos="right">Home</a>
		<h1>Jadual Pemakanan Ubat</h1>
	</div><!-- /header -->
	<FORM METHOD="POST" ACTION="jadualform_process.php" ENCTYPE="x-www-form-urlencoded">
				<div class="form-group">
				            <label for="thedate">Date</label>
				            <input name="datestart" class="form-control" type="text" data-role="datebox" data-options='{"mode": "datebox", "overrideDateFormat": "%Y-%-m-%-d "}' />
				          </div>
				          <div class="form-group">
				            <label for="mode9">Time</label>
				            <input name="timestart" class="form-control" id="mode9" type="text" data-role="datebox" data-options='{"mode":"timebox"}' />
				          </div>
						  <div class="form-group">
						<label for="slider-1">Input slider:</label>
						<input type="range" name="quantity" id="slider-1" value="3" min="0" max="100" />
												<br><label for="jenisubat" class="select">Jenis Ubat:</label>
												<select name="jenisubat" id="jenisubat">
													<option value="SL_IZ">SLUTEIN+IZUMIO</option>
													<option value="kenerak">Kenerak</option>
													<option value="Belalai Gajah">Belalai Gajah</option>
													<option value="Aprikot">Aprikot</option>
												</select>
						
				</div>
							<fieldset class="ui-grid-a">
		<div class="ui-block-b"><a href="home.php" data-role="button" data-theme="a" data-inline="false">Back</a></div>
								<!--div class="ui-block-a"><button type="submit" data-theme="c">Cancel</button></div-->
		<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>	   
							</fieldset>
		</form>
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
</body>
</html>
