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

class RequestCash 
{
    var $requestID;
	var $userLogin;
    var $amount;
    var $status;
	var $currencyID;
	var $currencySymbol;

    function RequestCash()
    {
    }
	
    function setRequestID($value)
    {
        $this->requestID=$value;
    }
    
    function getRequestID()
    {
        return $this->requestID;
    }
	
    
    function setUserLogin($value)
    {
        $this->userLogin=$value;
    }
    
    function getUserLogin()
    {
        return $this->userLogin;
    }
    
    function setAmount($value)
    {
        $this->amount=$value;
    }
    
    function getAmount()
    {
        return $this->amount;
    }   
	
    function setStatus($value)
    {
        $this->status=$value;
    }
    
    function getStatus()
    {
        return $this->status;
    }  	
	
    function setCurrencyID($value)
    {
        $this->currencyID=$value;
    }
    
    function getCurrencyID()
    {
        return $this->currencyID;
    }  	

    function setCurrencySymbol($value)
    {
        $this->currencySymbol=$value;
    }
    
    function getCurrencySymbol()
    {
        return $this->currencySymbol;
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

// get user/customer cash request status from session
$requestCashArray = $_SESSION['cash_request_array'];
$totalCashRequest = count($requestCashArray);

$cashApproved = 0;
$cashProcessing = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>Cash - view cash</title>
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
			<div id="pagetitle">
				<div id="title" class="titletext" align="right">Welcome to Cash!  <?php echo $user01->getFullName(); ?></div>
			</div>
		</div>
		<div id="content" align="center">
			<div id="menu" align="right">
				<?php include 'menu.php';?>
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" /></div>
			</div>
		<div id="contenttext">
		  <div class="panel" align="justify">
				<p>View Room </p>
				
                <p>Total room request: [<?php echo $totalCashRequest; ?>]</p>
				<table width="200" border="1">
                  <tr>
                    <th scope="col"><div align="center">ID</div></th>
                    <th scope="col"><div align="center">Room</div></th>
					<th scope="col"><div align="center">Comment</div></th>
                    <th scope="col"><div align="center">Status</div></th>
                  </tr>
				  
				  <?php
				     $requestCash = new RequestCash();
					 for($i=0; $i < count($requestCashArray); $i++)
					 {
						$requestCash = $requestCashArray[$i];
						
						if (strcmp($requestCash->getStatus(), "approved") == 0)
                     	{
                         	$cashApproved = $cashApproved + $requestCash->getAmount();
                     	}

                     	if (strcmp($requestCash->getStatus(), "processing") == 0)
                     	{                         	
                         	$cashProcessing = $cashProcessing + $requestCash->getAmount();
                     	}
						$amount = $requestCash->getAmount();
						$status = $requestCash->getStatus();
						
						$currencyID = $requestCash->getCurrencyID();
						$sql = "SELECT symbol FROM currency WHERE id = $currencyID";	
						$currencyData = mysql_query($sql, $con); 
						$row = mysql_fetch_array($currencyData); 
						$currencySymbol = $row["symbol"];
				  		
						$index = $i + 1;
						echo "<tr>";
                        echo "    <td><div align='center'>$index</div></td>";
						echo "    <td>&nbsp;$currencySymbol</td>";
						echo "    <td>&nbsp;$amount</td>";
                        echo "    <td>&nbsp;$status</td>";
                        echo "</tr>";
					 }
				  ?>
                  
                </table>
				<p>Current Total In Process Room: <?php echo $cashProcessing; ?></p>
                <p>Current Total Approved Room: <?php echo $cashApproved; ?></p>
		  </div>
		  </div>
		</div>
	
	</div>
</body>
</html>
