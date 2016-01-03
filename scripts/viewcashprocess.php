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

$login = $user01->getUserLogin();

$sql = "SELECT amount, status, currency_id FROM requestcash WHERE login = '$login'";	  
	  
$cashrequest_data = mysql_query($sql, $con); 

$i = -1;
$requestCashArray = array();

while($row = mysql_fetch_array($cashrequest_data))
{
   	$i = $i + 1;
	$requestCash = new RequestCash();
	$requestCash->setUserLogin($login);	 
	$requestCash->setAmount($row['amount']);	
	$requestCash->setStatus($row['status']);
	$requestCash->setCurrencyID($row['currency_id']);	
	$requestCashArray[$i] = $requestCash;	
} 

//put $requestCashArray into session
$_SESSION['cash_request_array'] = $requestCashArray;

//redirect to the viewcash.php (the VIEW)
$to = 'viewcash.php';
header('Location: '. $to);
mysql_close($con);
exit;	  
?>