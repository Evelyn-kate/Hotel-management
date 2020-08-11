<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php");
}
echo "<script>alert('Welcome sir/madam, please signup or login inorder to continue')</script>";
if (isset($_POST['submit'])) {
    
    $conn = mysqli_connect('localhost', 'root', '', 'hotel');

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $date = date("Y-m-d H:i:s"); 

    if ($_POST['password0'] == $_POST['password1']) {
        $password = mysqli_real_escape_string($conn, $_POST['password0']);
        $pwd = password_hash($password, PASSWORD_DEFAULT);

        $sql0 = "SELECT * FROM users WHERE Username = '$name'";
        $result0 = mysqli_query($conn, $sql0);  
        $count = mysqli_num_rows($result0); 
        if ($count > 0) {
            $SESSION['sign_msg'] = "Username already exists in the database please try again with a different name";
        }else {
            $sql = "INSERT INTO users (Username, Telephone, Email, Address, Password, Registration_Date) VALUES ('$name', '$telephone', '$email', '$address', '$pwd', '$date')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $_SESSION['id'] = $name;
                header('location: book.php');
            }else{
                $SESSION['sign_msg'] = "Sorry an error occurred and we couldnt complete the action please try again later";
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
<br><br><br><br><br><br>
<div class="col-md-4 col-md-offset-4">
	<div id="signup_form" class="well">
        <h2><center><span class="glyphicon glyphicon-user"></span> Sign Up</center></h2>
        <hr>
        <form method="POST" action="signup.php">
        Name: <input type="text" name="name" class="form-control" pattern="[a-zA-Z\s]+" required>
        <div style="height: 10px;"></div>
        Telephone: <input type="tel" name="telephone" class="form-control" pattern="[6]{1}[0-9]{8}" title="Phone number should be of 9 digits and must begin with a 6" required>
        <div style="height: 10px;"></div>
        Email: <input type="email" name="email" class="form-control" required> 
        <div style="height: 10px;"></div> 
        Address: <input type="text" name="address" class="form-control" required> 
        <div style="height: 10px;"></div>
        Password: <input type="password" name="password0" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> 
        <div style="height: 10px;"></div>
        Confirm Password: <input type="password" name="password1" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required> 
        <div style="height: 10px;"></div>
        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Sign Up</button> <a href="login.php"> Login</a>
        </form>
        <div style="height: 15px;"></div>
        <div style="color: red; font-size: 15px;">
            <center>
            <?php
                if(isset($SESSION['sign_msg'])){
                    echo $SESSION['sign_msg'];
                    unset($SESSION['sign_msg']);
                }
            ?>
            </center>
		</div>
	</div>
</div>
</body>
</html>
