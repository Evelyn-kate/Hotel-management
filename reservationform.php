<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php");
}
$date = date("Y-m-d H:i:s"); 

$conn = mysqli_connect('localhost', 'root', '', 'hotel');

$sql0 = "SELECT * FROM users WHERE Username ='".$_SESSION['id']."' ";
$result0 = mysqli_query($conn, $sql0);
$row0 = mysqli_fetch_assoc($result0);

$sql1 = "SELECT * FROM reservations WHERE Name ='".$_SESSION['id']."' AND Code = '".$_SESSION['code']."' ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2 = "SELECT * FROM payments WHERE Name ='".$_SESSION['id']."' AND Reservation_Code = '".$_SESSION['code']."' ";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Reservation Form</title>
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
<style type="text/css">
	html{
        margin-top: 0px !important;
        padding-top: 0px !important;
    }

	</style>
</head>
<body style="font-size: 13px;">
<div>
<br><br>
	<a href="index.php"><button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-backward"></span> Go back to hotel website</button></a>
<br><br>
</div>
    <div class="row">
    <div class="col-sm-12">
 <table border="0" width="100%" style="margin: 0 auto;">
    <tr>
        <td style="text-align: center;">HOTEL NAME
        </td>
    </tr>
</table>
  </div>      
    </div>
<div class="row">
	<div class="col-sm-12">
		<br><h3 style="text-align: center;"><u><strong>RESERVATION FORM</strong></u><br></h3>
	</div>
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<div style="border: 4px solid black;
	padding: 0px;
	margin-top: 0px;
	margin-bottom: 0px;">
</div>
	</div>
</div>

<br>
<div class="row">
	<div class="col-sm-12">
		Printed Date: <?php echo " " . $date . ""; ?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<div style="border: 4px solid black;
	padding: 0px;
	margin-top: 0px;
	margin-bottom: 0px;">
</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<br><h3><strong>Personal Information </strong><br></h3>
	</div>
	
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<div class="infor" style="overflow-x:auto;">
		<table border="1" style="border-collapse: collapse;" width="100%" height="auto">
			<tr>
				<td>Name </td>
				<td> <?php echo " " . $row0['Username'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Telephone </td>
				<td> <?php echo " " . $row0['Telephone'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Email </td>
				<td> <?php echo " " . $row0['Email'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Address </td>
				<td> <?php echo " " . $row0['Address'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Registration Date </td>
				<td> <?php echo " " . $row0['Registration_Date'] . ""; ?> </td>
			</tr>
		</table>
	</div>
	</div>

</div>

<br>
<div class="row">
	<div class="col-sm-12">
		<div style="border: 4px solid black;
	padding: 0px;
	margin-top: 0px;
	margin-bottom: 0px;">
</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<br><h3><strong>Reservation Information </strong><br></h3>
	</div>
	
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<div class="infor" style="overflow-x:auto;">
		<table border="1" style="border-collapse: collapse;" width="100%" height="auto">
			<tr>
				<td> Check in Date </td>
				<td> <?php echo " " . $row1['Check_in_Date'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Check out Date </td>
				<td> <?php echo " " . $row1['Check_out_Date'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Duration </td>
				<td> <?php echo " " . $row1['Duration'] . " nights"; ?> </td>
			</tr>
			<tr>
				<td> Room Number </td>
				<td> <?php echo " " . $row1['Room_No'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Amount </td>
				<td> <?php echo " " . $row1['Amount'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Reservation Code </td>
				<td> <?php echo " " . $row1['Code'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Reservation Date </td>
				<td> <?php echo " " . $row1['Reservation_Date'] . ""; ?> </td>
			</tr>
		</table>
	</div>
	</div>
	
	
</div>

<br>
<div class="row">
	<div class="col-sm-12">
		<div style="border: 4px solid black;
	padding: 0px;
	margin-top: 0px;
	margin-bottom: 0px;">
</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<br><h3><strong>Payment Information </strong><br></h3>
	</div>
	
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<div class="infor" style="overflow-x:auto;">
		<table border="1" style="border-collapse: collapse;" width="100%" height="auto">
			<tr>
				<td> Payment Method </td>
				<td> <?php echo " " . $row2['Method'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Amount </td>
				<td> <?php echo " " . $row2['Amount'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Status </td>
				<td> <?php echo " " . $row2['Status'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Transaction ID </td>
				<td> <?php echo " " . $row2['Transaction_ID'] . ""; ?> </td>
			</tr>
			<tr>
				<td> Payment Date </td>
				<td> <?php echo " " . $row2['Payment_Date'] . ""; ?> </td>
			</tr>
		</table>
	</div>
	</div>
	
	
</div>

<br>
<div class="row">
	<div class="col-sm-12">
		<div style="border: 4px solid black;
	padding: 0px;
	margin-top: 0px;
	margin-bottom: 0px;"></div>
</div>
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<div class="infor" style="overflow-x:auto;">
		<table border="0" style="border-collapse: collapse;" width="100%" height="auto">
			<tr>
				<td><strong>Please kindly submit this form or the reservation code at the receptionist at the time of check in.</strong><br>The Management</td>
			</tr>
		</table>
	</div>
	</div>
</div>

<div>
<br><br>
	<a href="downloadreservationform.php"><button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> DOWNLOAD</button></a>
<br><br>
</div>

</body>
</html>