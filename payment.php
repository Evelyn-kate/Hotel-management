<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    
    $conn = mysqli_connect('localhost', 'root', '', 'hotel');

    $name = $_SESSION['id'];
    $code = $_SESSION['code'];
    $price = $_SESSION['price'];
    $roomselected = $_SESSION['roomselected'];
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $refnum = mt_rand(1000000000, 9999999999);
    $date = date("Y-m-d H:i:s"); 

    $sql0 = "SELECT * FROM reservations WHERE Code = '$code'";
    $result0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($result0);
    $reservationid = $row0['Reservation_ID'];

    if ($_POST['method'] === 'Pay Pal' || $_POST['method'] === 'Visa Card') {
        echo "<script>alert('Sorry the only available method for payment is Mobile Money!)</script>";
    }elseif ($_POST['method'] === 'Mobile Money') {
        $sql1 = "SELECT * FROM payments WHERE Reservation_ID = '$reservationid' OR Reservation_Code = '$code'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $status = $row1['Status'];

        if ($status === 'Complete' ) {
            echo "<script>alert('Sorry a payment has already been made for this reservation!)</script>";
            header("Location: reservationform.php");
            exit();
        }else{
            $sql2 = "INSERT INTO payments (Amount, Status, Method, Transaction_ID, Name, Reservation_ID, Reservation_Code, Payment_Date) VALUES ('$price', 'Complete', '$method', '$refnum', '$name', '$reservationid', '$code', '$date')";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: reservationform.php");
                exit();
            }else{
                echo "<script>alert('Sorry an error occurred and we couldn't complete the action, please try again later!!)</script>";
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
                <a id="top_0_header_0_LnkLogo" href="index.php"><img src="images/logo.png" id="top_0_header_0_ImgLogo" width="80" height="60"></a>
            </div>
<br><br><br><br><br><br>
<div class="col-md-6 col-md-offset-3">
	<div id="signup_form" class="well">
        <h2><center><span class="glyphicon glyphicon-"></span> PAYMENT FORM</center></h2>
        <hr>
        <form method="POST" action="payment.php">
        Name: <input type="text" name="name" class="form-control"  value="<?php echo "" . $_SESSION["id"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Reservation Code: <input type="text" name="code" class="form-control"  value="<?php echo "" . $_SESSION["code"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Amount: <input type="text" name="price" class="form-control" value="<?php echo "" . $_SESSION["price"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Payment Method: <select name="method" id="method" required="required" class="form-control">
                                  <option value="" selected disabled hidden>Select payment method below</option>
                                  <option value="Mobile Money">Mobile Money</option>
                                  <option value="Pay Pal">Pay Pal</option>
                                  <option value="Visa Card">Visa Card</option>
                        </select>
        <div style="height: 10px;"></div> 
        Telephone: <input type="tel" name="telephone" class="form-control" pattern="[6]{1}[0-9]{8}" title="Phone number should be of 9 digits and must begin with a 6" placeholder="Enter a mobile money number" required="required"> 
        <div style="height: 10px;"></div>
        Pin Code: <input type="number" name="pincode" class="form-control" required="required"> 
        <div style="height: 10px;"></div>
        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-forward"></span> NEXT</button>
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
