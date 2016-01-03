<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="author" content="Wink Hosting (www.winkhosting.com)" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" href="images/style.css" type="text/css" />
	<title>System Login</title>
</head>
<body>
        <div id="page" align="center">
		
			</div>
			

		
				
	<div id="contenttext">
		  <div class="panel" align="justify">
		  
			<P><center>
  				<B><FONT SIZE="+3" FACE="Arial Black">Registration Result </FONT></B>
			</P>				
            
			<p>New Client Registration: SUCCESSFULL!</p>
			<p>Login:  <?php echo $_SESSION['login']; ?></p>
			<p>Password:  <?php echo $_SESSION['password']; ?></p>
			<p>Full Name:  <?php echo $_SESSION['fullname']; ?></p>
			<p>Click <a href="index.html">here</a> to Login to the system</p>
			
		  </div>
		  </div>
		</div>
		
	</div></center>
   
</body>
</html>
