<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php");
}

$conn = mysqli_connect('localhost', 'root', '', 'hotel');

$sql0 = "SELECT * FROM roomstatus WHERE Status = 'Available'";
$result0 = mysqli_query($conn, $sql0);

$selectedroom = $_COOKIE["roomno"];
$sql00 = "SELECT * FROM rooms WHERE Room_No = '$selectedroom'";
$result00 = mysqli_query($conn, $sql00);
$row00 = mysqli_fetch_assoc($result00);

if (isset($_POST['submit'])) {
    
    $conn = mysqli_connect('localhost', 'root', '', 'hotel');

    $name = $_SESSION['id'];
    $arrivedate = $_SESSION['arrivedate'];
    $departdate = $_SESSION['departdate'];
    $duration = $_SESSION['duration'];
    $roomselected = $_COOKIE["roomno"];
    $code = mt_rand(1000000000, 9999999999);
    $date = date("Y-m-d H:i:s"); 

    $sql1 = "SELECT * FROM rooms WHERE Room_No = '$roomselected'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $price = $row1['Price'];

    $price = $price*$duration;

    $sql2 = "INSERT INTO reservations (Name, Check_in_Date, Check_out_Date, Duration, Room_No, Amount, Code, Reservation_Date) VALUES ('$name', '$arrivedate', '$departdate', '$duration', '$roomselected', '$price', '$code', '$date')";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {

        $sql3 = "UPDATE roomstatus SET Status = 'Reserved', Starting_Date = '$arrivedate', Ending_Date = '$departdate' WHERE Room_No = '$roomselected'";
        $result3 = mysqli_query($conn, $sql3);

        $sql4 = "UPDATE rooms SET Status = 'Reserved' WHERE Room_No = '$roomselected'";
        $result4 = mysqli_query($conn, $sql4);

        $_SESSION['roomselected'] = $roomselected;
        $_SESSION['code'] = $code;
        $_SESSION['price'] = $price;
        header("Location: payment.php");
        exit();
    }else{
        echo "<script>alert('Sorry an error occurred and we couldn't complete the action, please try again later!!)</script>";
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
        <h2><center><span class="glyphicon glyphicon-"></span> RESERVATION FORM</center></h2>
        <hr>
        <form method="POST" action="book.php">
        Name: <input type="text" name="name" class="form-control"  value="<?php echo "" . $_SESSION["id"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Check in Date: <input type="date" name="arrivedate" class="form-control"  value="<?php echo "" . $_SESSION["arrivedate"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Check out Date: <input type="date" name="departdate" class="form-control" value="<?php echo "" . $_SESSION["departdate"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Duration: <input type="text" name="duration" class="form-control" value="<?php echo "" . $_SESSION["duration"] . ""; ?>" disabled="disabled">
        <div style="height: 10px;"></div>
        Rooms: <input type="text" name="rooms" class="form-control" value="<?php echo "" . $_SESSION["rooms"] . " rooms"; ?>" disabled="disabled"> 
        <div style="height: 10px;"></div> 
        Adults: <input type="text" name="adults" class="form-control" value="<?php echo "" . $_SESSION["adults"] . " per room"; ?>" disabled="disabled"> 
        <div style="height: 10px;"></div>
        Available Rooms: <select name="roomselected" id="roomselected" class="form-control" onchange="setRoomNo()">
                                  <option value="" selected disabled hidden>Select room to view price and description</option>
                                  <?php 
                                  while ($row0 = mysqli_fetch_assoc($result0)) { ?>
                                      <option value="<?php echo "" . $row0['Room_No'] . ""; ?>"><?php echo "" . $row0['Room_No'] . ""; ?></option>
                                  <?php } ?>
                        </select>

                        <script>
                        function setRoomNo(){
                         var roomno = document.getElementById('roomselected').value;
                          document.cookie = "roomno="+roomno;
                          window.location.href='book.php';
                        }

                        </script>
        <?php
        if ($row00) {  ?>
        <div style="height: 10px;"></div>
        <div>
            Selected Room
                <div style="width: 100%; height: 400px;"><img width="80%" height="250" style="display: block; margin: 0 auto;" src="pictures/<?= $row00['Picture'] ?>">
                    <p><strong>Room Type: </strong><?php echo "" . $row00['Type'] . ""; ?></p>
                    <p><strong>Description: </strong><?php echo "" . $row00['Description'] . ""; ?> </p>
                    <p><strong>Price: </strong><?php echo "" . $row00['Price'] . "CFA"; ?> </p>
                </div>
        </div>
        <?php } ?>
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
