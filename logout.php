<?php
  session_start();
  unset($_SESSION['user']);
  session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>Cash Management System - Logout - Session Terminated!</title>
</head>
<body>
	<div id="page" align="center">
		<div id="toppage" align="center">
			
			
		</div>
		<div id="header" align="center">
			
			
		</div>
		<div id="content" align="center">
			<div id="menu" align="right">
				
				<div align="right" style="width:189px; height:8px;"><img src="images/mnu_bottomshadow.gif" width="189" height="8" alt="mnubottomshadow" /></div>
			</div>
		<div id="contenttext">
		  <div class="panel" align="justify">
				<p>
<FORM METHOD="POST" ACTION="login.php"
ENCTYPE="x-www-form-urlencoded">
<P><CENTER>
  <B><FONT SIZE="+3" FACE="Arial Black">Login Terminated! </FONT> </B>
</CENTER></P>

<P><CENTER>
  <h1>You has logout from the system! </h1>
  <h2>Please <a href="index.html">re-login</a> to re-enter the system!</h2>
  <h2>&nbsp;</h2>
</CENTER></P>

<P><CENTER>
</CENTER></P>
</FORM>
				</p>
		  </div>
		  </div>
		</div>
		
</body>
</html>
