<?php

if (isset($_POST['submit'])) {
	$conn = mysqli_connect('localhost', 'root', '', 'hotel');
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);


	$sql = "SELECT * FROM users WHERE Username='$username'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck < 1) {
		$SESSION['msg'] =  "Username doesnt exist";
	}
	else {
		  
		 if ($row = mysqli_fetch_assoc($result)) 
		   {
		   	  $check = password_verify($_POST['password'], $row['Password']);
			
			   if ($check == false) 
			   {
				$SESSION['msg'] =  "Wrong Password";
			   }
			  elseif ($check == true) 
			   { 
			   	    session_start();
			   		$_SESSION['id'] = $row['Username'];
				    header("Location: home.php");
				    exit();
			   }
		    }
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOTEL NAME</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---To ensure proper rendering and touch zooming in Mobile Phones-->
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="VIcurrentDateTime" content="636814720930913779">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"> 

    <!---For Font-Aswesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css-bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css-font-awesome.min.css">   
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="canonical" href="index.php">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>    
    <script type="text/javascript" src="layouts/system/VisitorIdentification.js"></script>
    <script src="js-bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="bootstrap.js"></script>
    <script src="npm.js"></script>
    <script src="lib/jquery.min.js"></script>
    <script src="lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>   
    <script type="text/javascript" src="layouts/system/VisitorIdentification.js"></script>
</head>

<body id="body" style="background-image: url(images/bg3.jpg);">

    
        <div id="c1" class="container-fluid">
                
        <header class="wlv-home-header">
            <div class="container-fluid">
                
            <div id="menu-hamburger">
               <div class="menu-hamburger-text"> MENU </div>
            </div>
            <div class="wlv-logo">
                <a id="top_0_header_0_LnkLogo" href="../index.php"><img src="images/logo.png" id="top_0_header_0_ImgLogo" width="80" height="60"></a>
            </div>


<div class="wlv-top-nav-container">
    <div class="container">

        <div class="wlv-top-nav-inner">
            <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
            <ul class="wlv-top-nav">

                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_2" class="menu-item" href="../index.php">HOME</a>
                        </li>
                    
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_2" class="menu-item" href="../rooms/index.php">ROOMS & SUITES</a>
                        </li>
                    
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_3" class="menu-item" href="../dinning/index.php">DINING</a>
                        </li>
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_6" class="menu-item" href="../amenties/index.php">AMENITIES</a>
                        </li>
                        <li class="menu-item visible-xs visible-sm menu-visibility" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_8" class="menu-item" href="../about/index.php">ABOUT US</a>
                            
                                    <ul class="wlv-top-nav-sub" role="menu">
                                
                                    <li id="top_0_header_1_RptNavigation_RptSubNavigation_8_liSubMenu_0" class="menu-item">
                                        <a id="top_0_header_1_RptNavigation_RptSubNavigation_8_LnkSubItem_0" class="dropdown-toggle" role="menuitem" href="../about/index.php">ABOUT US INFO</a>

                                        


                                    </li>
                                
                                    <li id="top_0_header_1_RptNavigation_RptSubNavigation_8_liSubMenu_1" class="menu-item">
                                        <a id="top_0_header_1_RptNavigation_RptSubNavigation_8_LnkSubItem_1" class="dropdown-toggle" role="menuitem" href="../about/index.php">CONTACT INFO</a>

                                        


                                    </li>
                                
                                    <li id="top_0_header_1_RptNavigation_RptSubNavigation_8_liSubMenu_2" class="menu-item">
                                        <a id="top_0_header_1_RptNavigation_RptSubNavigation_8_LnkSubItem_2" class="dropdown-toggle" role="menuitem" href="../about/index.php">DIRECTIONS</a> 
                                    </li>

                                    </ul>
                                
                        </li>
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_6" class="menu-item" href="index.php">MY RESERVATIONS</a>
                        </li>
                    
            </ul>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<div class="col-md-4 col-md-offset-4">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> Please Login</center></h2>
		<hr>
		<form method="POST" action="index.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> No account? <a href="signup.php"> Sign up</a>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				if(isset($SESSION['msg'])){
					echo $SESSION['msg'];
					unset($SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
</body>
</html>
