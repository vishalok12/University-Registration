<?php
	//Start session
	session_start();
	
	if( isset($_SESSION['SESS_MEMBER_ID']) ) {
		header("location: member-index.php");
		exit();
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="javascript/style2.css" rel="stylesheet" type="text/css" />

</head>

<body><br>

<div id="wrapper"> <!--  Boday Wrapper -->

	<div id="pagewrapper"> <!--  Page Wrapper -->
	
		<div id="pagesize"> <!--  Page Size -->
		
		
		
		<table id="header" border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody><tr>
				<td width="120"><img src="javascript/images/logo.jpg" title="logo"></td>
				<td>
				 <table border="0" width="100%">
				 <tr><td align="left">
				 <div id="content">
					<h3 align="right" class="tagcloud"><a href="register-form.php"> sign up </a></h3>
				 </div>
				 </td>
				 </tr><tr>
				    <td>
					<h1>&nbsp;&nbsp;EXAM COUNCELLING&nbsp;</h1>
					</td>
				</tr>
				</table>					
				</td>
			</tr>
		</tbody></table>
		<br>
		<div id="content">		
		<div class="head-nav">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
				 <tr>
					<td class="sn"><h3>Welcome to this Website</h3></td>
				 </tr>
			    </tbody>
			</table>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
			<tr>
				<td bgcolor="#eaeaea" valign="top" width="210">
				
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
						<tr>
							<td class="left-side-nav">
								<ul>
									<li><a href="#" target="_top" onmouseover="changeStatus('Super Mario');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="Home" id="dk1" name="dk1">Home</a></li>
									<li><a href="#" target="_top" onmouseover="changeStatus('Video Games');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="About us" id="dk2" name="dk2">About</a></li>
									<li><a href="#" target="_top" onmouseover="changeStatus('Download Files');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="References" id="dk3" name="dk3">References</a></li>
									<li><a href="#" target="_top" onmouseover="changeStatus('College Info');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="College Lists" id="dk6" name="dk6">College List</a></li>
									<li><a href="#" target="_top" onmouseover="changeStatus('Download Movies');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="Go To Help" id="dk7" name="dk7">Help</a></li>
									
								</ul>
							</td>
						</tr>
						
					</tbody></table>
				</td>
				
				<td valign="top">
				
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody><tr>
							<td style="padding-top: 0px;" align="center" bgcolor="#051529" valign="middle" width="60%">
								<div align="left"><img src="javascript/images/Entrance_Exam_Results.jpg" id="image1" alt="image1" title="image1" width="320" height="220">							</div></td>
							
							<td class="tophead" bgcolor="#0d2951" valign="top" width="210">
								<h2>Top News:</h2>
								<ul>
									<li><a href="#" target="_top" onmouseover="changeStatus('Free Music');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="News1" id="dk9" name="dk9">NEWS 1</a></li>
									<li><a href="#" target="_top" onmouseover="changeStatus('Free Music');return true;" onmouseout="changeStatus('');return true;" onclick="showPop=0;  return modifyKeywordClickURL(this, 'kwclk');;" title="News2" id="dk9" name="dk9">NEWS 2</a></li>
								</ul>
							</td>
							
						</tr>
					 </tbody></table>
					
					<table class="sub-list" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody><tr>
							<td width="50%"><h3>Members:</h3></td>
							<td width="50%"><h3>Login Here:</h3></td>
						</tr>
						<tr>
						  <td style="border-right: 1px solid rgb(54, 57, 57);">
								<ul>
									<li><a href="#" target="_top" name="vishal" title="vishal">Vishal Kumar</a></li>
									<li><a href="#" target="_top" name="santosh" title="santosh">Santosh Kumar</a></li>
									<li><a href="#" target="_top" name="ankit" title="ankit">Ankit Agarwal</a></li>
								</ul>
						  </td>
						  <td style="border-right: 1px solid rgb(54, 57, 57);">
						  <ul>
								<form id="loginForm" name="loginForm" method="post" action="login-exec.php">
  									<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    									<tr>
      										<td width="112"><b>Login</b></td>
      										<td width="188"><input name="login" type="text" id="login" /></td>
    									</tr>
    									<tr>
      										<td><b>Password</b></td>
      										<td><input name="password" type="password" id="password" /></td>
    									</tr>
    									<tr>
      										<td>&nbsp;</td>
      										<td><input type="submit" name="Submit" value="Login" /></td>
    									</tr>
										<tr>
	  										<td>&nbsp;</td>
	  										<td>&nbsp;</td>
										</tr>
  									</table>
								</form>
							</ul>
						  </td>
					  </tr>
					</tbody></table>
				</td>
			</tr>
		</tbody></table>

		</div>
		<br>
		<br>
	</div>	
</div>
</div>


<!------ Rcom pupunder body footer code ------>
<!------ End Rcom pupunder body footer code ------>

<script type="text/javascript"><!--
			if( self != self.top )
			{
				window.top.document.title = window.document.title;
			}
	//-->

</script>
</body></html>
