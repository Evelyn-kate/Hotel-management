<?php

if (isset($_POST['submit'])) {
    
    $conn = mysqli_connect('localhost', 'root', '', 'hotel');

    $arrivedate = mysqli_real_escape_string($conn, $_POST['arrivedate']);
    $departdate = mysqli_real_escape_string($conn, $_POST['departdate']);
    $rooms = mysqli_real_escape_string($conn, $_POST['rooms']);
    $adults = mysqli_real_escape_string($conn, $_POST['adults']);
    $promocode = mysqli_real_escape_string($conn, $_POST['promocode']);

    if ($arrivedate > $departdate) {
        echo "<script>alert('Depart date cannot be less than arrive date')</script>";
    }else{

        $arrivedate1 = strtotime($arrivedate);
        $departdate1 = strtotime($departdate);

        $duration1 = $departdate1-$arrivedate1;

        $duration = $duration1/86400;

        $sql0 = "SELECT * FROM roomstatus WHERE Status = 'Available' OR Ending_Date < '$arrivedate' ";
        $result0 = mysqli_query($conn, $sql0);
        $count0 = mysqli_num_rows($result0);

        if ($count0 == 0) {
                echo "<script>alert('Sorry we have no available rooms for the time frame you specified')</script>";
        }else{
                session_start();
                $_SESSION['id'] = 1;
                $_SESSION['arrivedate'] = $arrivedate;
                $_SESSION['departdate'] = $departdate;
                $_SESSION['rooms'] = $rooms;
                $_SESSION['adults'] = $adults;
                $_SESSION['promocode'] = $promocode;
                $_SESSION['duration'] = $duration;
                header("Location: signup.php");
                exit();
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

<body id="body">

    
        <div id="c1" class="container-fluid">
                
        <header class="wlv-home-header">
            <div class="container-fluid">
                
            <div id="menu-hamburger">
               <div class="menu-hamburger-text"> MENU </div>
            </div>
            <div class="wlv-logo">
                <a id="top_0_header_0_LnkLogo" href="index.php"><img src="images/logo.png" id="top_0_header_0_ImgLogo" width="80" height="60"></a>
            </div>
            <div id="widget-collapse-button" class="pull-right">
                <button type="button" name="mobileBookButton" id="btnMobileBook" class="btn-red btn-main">BOOK</button>
            </div>


<div class="wlv-top-nav-container">
    <div class="container">

        <div class="wlv-top-nav-inner">
            <a class="sr-only sr-only-focusable" href="#content">Skip to main content</a>
            <ul class="wlv-top-nav">

                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_2" class="menu-item" href="index.php">HOME</a>
                        </li>
                    
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_2" class="menu-item" href="rooms/index.php">ROOMS & SUITES</a>
                        </li>
                    
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_3" class="menu-item" href="dinning/index.php">DINING</a>
                        </li>
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_6" class="menu-item" href="amenties/index.php">AMENITIES</a>
                        </li>
                        <li class="menu-item visible-xs visible-sm menu-visibility" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_8" class="menu-item" href="about/index.php">ABOUT US</a>
                            
                                    <ul class="wlv-top-nav-sub" role="menu">
                                
                                    <li id="top_0_header_1_RptNavigation_RptSubNavigation_8_liSubMenu_0" class="menu-item">
                                        <a id="top_0_header_1_RptNavigation_RptSubNavigation_8_LnkSubItem_0" class="dropdown-toggle" role="menuitem" href="about/index.php">ABOUT US INFO</a>

                                        


                                    </li>
                                
                                    <li id="top_0_header_1_RptNavigation_RptSubNavigation_8_liSubMenu_1" class="menu-item">
                                        <a id="top_0_header_1_RptNavigation_RptSubNavigation_8_LnkSubItem_1" class="dropdown-toggle" role="menuitem" href="about/index.php">CONTACT INFO</a>

                                        


                                    </li>
                                
                                    <li id="top_0_header_1_RptNavigation_RptSubNavigation_8_liSubMenu_2" class="menu-item">
                                        <a id="top_0_header_1_RptNavigation_RptSubNavigation_8_LnkSubItem_2" class="dropdown-toggle" role="menuitem" href="about/index.php">DIRECTIONS</a> 
                                    </li>

                                    </ul>
                                
                        </li>
                        <li class="menu-item ss" runat="server" id="liMenu">
                            <a id="top_0_header_1_RptNavigation_LnkItem_6" class="menu-item" href="reservations/index.php">MY RESERVATIONS</a>
                        </li>
                    
            </ul>
        </div>
    </div>
</div>

<div class="wlv-widgets">
    <div class="wlv-content-text">
        <div class="wlv-widget-tabs">

            <div id="liItem" class="tab active" style="display: none">
                <a id="LnkItem" href="#wlv-room-reservation-form">
                    <span class="wlv-widget-tab-main">ROOM
                    </span>
                    <span class="wlv-widget-tab-mobile">ROOMS
                    </span>
                    <span class="wlv-widget-tab-auxtext">RESERVATIONS
                    </span>
                </a>
            </div>

            <div id="liItem" class="tab " style="display: none">
                <a id="LnkItem" href="#wlv-dining-reservation-form">
                    <span class="wlv-widget-tab-main">DINING
                    </span>
                    <span class="wlv-widget-tab-mobile">DINING
                    </span>
                    <span class="wlv-widget-tab-auxtext">RESERVATIONS
                    </span>
                </a>
            </div>
        </div>

        <div class="wlv-widget-content">
            <div id="wlv-room-reservation-form" class="wlv-widget-form row" style="display:none">
                <form method="POST" action="index.php">
                <div class="form-row col-xs-12 col-sm-6 col-md-6" id="tabletDropArrive">
                    <label id="arriveLabel" for="tbSarCheckIn">
                        ARRIVE
                    </label>
                    <input name="arrivedate" type="date" required="required" id="tbSarCheckIn" class="form-control text-calendar" style="cursor: default;">
                </div>
                <div class="form-row col-xs-12 col-sm-6 col-md-6" id="tabletDropDepart">
                    <label id="departLabel" for="tbSarCheckOut">
                        DEPART
                    </label>
                    <input name="departdate" type="date" required="required" id="tbSarCheckOut" class="form-control text-calendar" style="cursor: default;" data-trigger="manual" data-toggle="popover" data-placement="bottom">
                </div>
                <div class="form-row col-xs-12 col-sm-6 col-md-6" id="tabletDropRooms">
                        <label id="roomsLabel" for="ddSarRoomCount">
                            ROOMS
                        </label>
                        <select id="ddSarRoomCount" name="rooms" required="required" class="form-control select-sm">
                            <option selected="selected" value="1">1
                            <option value="2">2
                            <option value="3">3
                            <option value="4">4
                        </select>
                </div>
                <div class="form-row col-xs-12 col-sm-6 col-md-6" id="tabletDropAdults">
                        <label id="adultsLabel" for="ddSarAdultCount">
                            ADULTS
                        </label>
                        <select id="ddSarAdultCount" name="adults" required="required" class="form-control select-md" data-trigger="manual" data-toggle="popover" data-placement="bottom">
                            <option value="1">1 per room
                            <option selected="selected" value="2">2 per room
                            <option value="3">3 per room
                            <option value="4">4 per room
                        </select>
                </div>
                 <div class="form-row col-xs-12 col-sm-6 col-md-6" id="tabletDropPromo">
                      <label id="promoLabel" for="tbPromoCode">
                            PROMO CODE
                      </label>
                      <input type="text" class="form-control text-normal" id="tbPromoCode" name="promocode" placeholder="0000">
                 </div>
                
                <div class="form-buttons form-row col-xs-12 col-sm-6 col-md-6" id='roomButton'>
                    <button type="submit" name="submit" id="maSubmitSar" class="btn-red btn-main">
                        CHECK AVAILABILITY
                    </button>
                </div> 
                </form>
            </div>

            <div id="wlv-dining-reservation-form" class="wlv-widget-form row">
                <form method="POST" action="">
                <div class="form-row col-xs-12 col-sm-6 col-md-6" id="restaurantField">
                    <label id="restaurantLabel" for="SelectedRestaurant">
                        RESTAURANT
                    </label>
                    <select name="SelectedRestaurant" id="SelectedRestaurant" class="form-control select-lg">
                        <option value="">Select a Restaurant
                        
                                <option value="Restaurant 1">
                                    Restaurant 1
                                
                            
                                <option value="Restaurant 2">
                                    Restaurant 2
                                
                            
                                <option value="Restaurant 3">
                                    Restaurant 3
                            
                    </select>
                </div>
                <div class="form-row hidden-xs hidden-sm party-field-desktop" id="partyField">
                    <label id="partyLabel" for="ddSadDiningCount">
                        PARTY
                    </label>
                    <select name="ddSadDiningCount" id="ddSadDiningCount" class="form-control select-sm">
                        <option value="1">1
                        <option selected="selected" value="2">2
                        <option value="3">3
                        <option value="4">4
                        <option value="5">5
                        <option value="6">6
                    </select>
                </div>
                <div class="form-row party-field-mobile visible-xs visible-sm col-xs-12 col-sm-6 col-md-6" id="partyField">
                    <label id="partyLabel" for="ddSadDiningCount">
                        PARTY SIZE
                    </label>
                    <select name="ddSadDiningCount" id="ddSadDiningCount" class="form-control select-sm">
                        <option value="1">1
                        <option selected="selected" value="2">2
                        <option value="3">3
                        <option value="4">4
                        <option value="5">5
                        <option value="6">6
                    </select>
                </div>
           
                <div class="form-row col-xs-12 col-sm-6 col-md-6" id="dateField">
                     <label id='dateLabel' for="tbSadCheckIn">
                            DATE
                        </label>
                        <input type="text" class="form-control text-calendar" id="tbSadCheckIn" name="dinner_date" value="" readonly="" style="cursor: default;">
                </div>
            <div class="form-row col-xs-12 col-sm-6 col-md-6" id="restaurantTimeForm">
                <label id="timeLabel" for="ddSadDiningTime">TIME</label>
                <select name="ddSadDiningTime" id="ddSadDiningTime" class="form-control select-md">
                    <option value="12:00 AM">12:00 AM
                    <option value="12:30 AM">12:30 AM
                    <option value="1:00 AM">1:00 AM
                    <option value="1:30 AM">1:30 AM
                    <option value="2:00 AM">2:00 AM
                    <option value="2:30 AM">2:30 AM
                    <option value="3:00 AM">3:00 AM
                    <option value="3:30 AM">3:30 AM
                    <option value="4:00 AM">4:00 AM
                    <option value="4:30 AM">4:30 AM
                    <option value="5:00 AM">5:00 AM
                    <option value="5:30 AM">5:30 AM
                    <option value="6:00 AM">6:00 AM
                    <option value="6:30 AM">6:30 AM
                    <option value="7:00 AM">7:00 AM
                    <option value="7:30 AM">7:30 AM
                    <option value="8:00 AM">8:00 AM
                    <option value="8:30 AM">8:30 AM
                    <option value="9:00 AM">9:00 AM
                    <option value="9:30 AM">9:30 AM
                    <option value="10:00 AM">10:00 AM
                    <option value="10:30 AM">10:30 AM
                    <option value="11:00 AM">11:00 AM
                    <option value="11:30 AM">11:30 AM
                    <option value="12:00 PM">12:00 PM
                    <option value="12:30 PM">12:30 PM
                    <option value="1:00 PM">1:00 PM
                    <option value="1:30 PM">1:30 PM
                    <option value="2:00 PM">2:00 PM
                    <option value="2:30 PM">2:30 PM
                    <option value="3:00 PM">3:00 PM
                    <option value="3:30 PM">3:30 PM
                    <option value="4:00 PM">4:00 PM
                    <option value="4:30 PM">4:30 PM
                    <option selected="selected" value="5:00 PM">5:00 PM
                    <option value="5:30 PM">5:30 PM
                    <option value="6:00 PM">6:00 PM
                    <option value="6:30 PM">6:30 PM
                    <option value="7:00 PM">7:00 PM
                    <option value="7:30 PM">7:30 PM
                    <option value="8:00 PM">8:00 PM
                    <option value="8:30 PM">8:30 PM
                    <option value="9:00 PM">9:00 PM
                    <option value="9:30 PM">9:30 PM
                    <option value="10:00 PM">10:00 PM
                    <option value="10:30 PM">10:30 PM
                    <option value="11:00 PM">11:00 PM
                    <option value="11:30 PM">11:30 PM
                    </select>
                </div>
                
                <div class="form-buttons form-row col-xs-12 col-sm-6 col-md-6" id='restaurantButton'>
                    <button type="submit" name="submit" id="maSubmitSar" class="btn-red btn-main">
                        CHECK AVAILABILITY
                    </button>
                </div> 
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/moment.min.js"></script>
<script type="text/javascript">
    var desktop = window.matchMedia('(min-width: 768px)');
                
                
    $('#wlv-room-reservation-form').show();
    $('#wlv-dining-reservation-form').hide();
    $('#wlv-dining-entertainment-form').hide();
    
</script>

            </div>
        </header>
        </div>

        <div id="c2" class="container-fluid">
            
    
<div class="row wlv-home-main">
    <div class="col-md-12 ">
            
<style>
    body {
        overflow: hidden;
    }
</style>

            
            
            <div class="video-container">
               
                <video data-src="video.mp4" id="video-background" playsinline="" autoplay="" muted="" loop=""> 
                </video>
                     
               
            </div>
            
            <div class="overlay-desc col-md-12">
                    <h2>
                        
                    </h2>
                    <p>
                        SOME TEXT ABOUT HOTEL <br> SOME TEXT ABOUT HOTEL.
                    </p>
            </div>
            <script>
                jQuery(document).ready(function () {
                    var adjustBackground = function() {
                        var video = document.getElementById("video-background");
                        //var image = document.getElementsByClassName("video-container")[0];
                        var image = document.getElementById("video-background");

                        if (window.matchMedia("(min-width: 1024px)").matches && video.src === "") {

                            video.src = video.getAttribute("data-src");
                            video.load();

                            var imageLarge = image.getAttribute("data-img-lg");
                            image.style.backgroundImage = "url('" + imageLarge + "')";
                        } else if(window.matchMedia("(max-width: 1023px)").matches) {
                            video.src = video.getAttribute("data-src");
                            video.load();

                            var imageLarge = image.getAttribute("data-img-lg");
                            image.style.backgroundImage = "url('" + imageLarge + "')";
                        }
                    };

                    $(window).on('resize', $.throttle(200, function () {
                        adjustBackground();
                    }));

                    adjustBackground();
                });
            </script>
        
    </div>
</div>
        </div>

        <div id="c3" class="container-fluid">
            
<footer class="footer-fixed-bottom">
    <div class="container-fluid">
        <div class="wlv-footer-container">
                

<div class="desktop social hidden-xs hidden-sm wlv-footer-element">
    <div class="social hidden-xs hidden-sm wlv-footer-element">
<a href="http://www.facebook.com/hotelname" target="_blank" style="display: inline-block; margin-right: 0.8em;">
<img alt="Facebook" class="fa fa-facebook" style="height: 24px; width: 24px;">
</a>
<a href="http://www.twitter.com/hotelname" target="_blank" style="display: inline-block; margin-right: 0.8em;">
<img height="24" alt="Twitter" width="24" class="fa fa-twitter">
</a>
<a href="http://www.instagram.com/hotelname" target="_blank" style="display: inline-block; margin-right: 0.8em;">
<img height="24" alt="Instagram" width="24" class="fa fa-instagram">
</a>
</div>
</div>
<div class="hidden-xs hidden-sm wlv-footer-element">
    <ul class="wlv-footer-nav">
    <li class="menu-item"><a href="about/index.php">ABOUT US</a></li>
    <li>|</li>
    <li class="menu-item"><a href="about/index.php" target="_blank">COTACT US</a></li>
    <li>|</li>
    <li class="menu-item"><a href="about/index.php" target="_blank">LOCATE US</a></li>
    <li>|</li>
    <li class="menu-item"><a href="privacy.php">PRIVACY</a></li>
    <li>|</li>
    <li class="menu-item"><a href="terms.php" target="_blank">TERMS</a></li>
</ul>

</div>

<div class="visible-xs visible-sm wlv-footer-nav-wrap">
    <ul class="wlv-footer-nav">
    <li class="menu-item"><a href="about/index.php">ABOUT US</a></li>
    <li>|</li>
    <li class="menu-item"><a href="about/index.php" target="_blank">CONTACT US</a></li>
    <li>|</li>
    <li class="menu-item"><a href="about/index.php" target="_blank">LOCATE US</a></li>
  </ul>
<ul class="wlv-footer-nav">
    <li class="menu-item"><a href="privacy.php">PRIVACY</a></li>
    <li>|</li>
    <li class="menu-item"><a href="terms.php" target="_blank">TERMS</a></li>
</ul>
</div>

<div class="social visible-xs visible-sm">
    <div class="social hidden-md hidden-lg wlv-footer-element">
<a href="http://www.facebook.com/hotelname" target="_blank" style="display: inline-block; margin-right: 0.8em;">
<img alt="Facebook" class="fa fa-facebook" style="height: 24px; width: 24px;">
</a>
<a href="http://www.twitter.com/hotelname" target="_blank" style="display: inline-block; margin-right: 0.8em;">
<img height="24" alt="Twitter" width="24" class="fa fa-twitter">
</a>
<a href="http://www.instagram.com/hotelname" target="_blank" style="display: inline-block; margin-right: 0.8em;">
<img height="24" alt="Instagram" width="24" class="fa fa-instagram">
</a>
</div>
</div>



<div class="footer-copyright wlv-footer-element">
    &copy; <?php echo date("Y");?> HOTEL NAME. <br> All rights reserved.
</div>

        </div>
    </div>
</footer>

            <script type="text/javascript">
                (function(a,b,c,d){
                a='../tags.tiqcdn.com/utag/wynnlv/main/prod/utag.js';
                b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;
                a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a);
                })();
            </script>
        
        </div>
    <script type="text/javascript" src="assets/js/combined_85734FC8CEB3EC8DDFF14BD685124398.js"></script>
</body>
</html>
