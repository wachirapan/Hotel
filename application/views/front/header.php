
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bright Hotel - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/aos.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/front/')?>css/style.css">

    <script src="<?php echo base_url('assets/front/')?>js/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">BrightHotel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="<?php echo site_url('welcome/index')?>" class="nav-link">หน้าหลัก</a></li>
                <li class="nav-item"><a href="<?php echo site_url('welcome/room')?>" class="nav-link">จอง</a></li>
                <?php if($this->session->userdata('customer_login') == ""){ ?>
                    <li class="nav-item"><a href="<?php echo site_url('welcome/login')?>" class="nav-link">ล็อคอิน</a></li>
                <?php }else{?>
                    <li class="nav-item"><a href="<?php echo site_url('welcome/payment')?>" class="nav-link">ค่าจอง</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('Logincustomer/logout')?>" class="nav-link">ล็อคเอ้า</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('welcome/')?>" class="nav-link">ค่าหอ</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('welcome/')?>" class="nav-link">ย้อนหลัง</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('welcome/checkoutroom')?>" class="nav-link">แจ้งออก</a></li>
                    <li class="nav-item"><a href="<?php echo site_url('welcome/changeroom')?>" class="nav-link">แจ้งย้าย</a></li>
                <?php }?>


            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
        <div class="block-30 item" style="background-image: url('<?php echo base_url('assets/front/')?>images/bg_2.jpg');" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <span class="subheading-sm">Welcome</span>
                        <h2 class="heading">Enjoy a Luxury Experience</h2>
                        <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-30 item" style="background-image: url('<?php echo base_url('assets/front/')?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <span class="subheading-sm">Welcome</span>
                        <h2 class="heading">Simple &amp; Elegant</h2>
                        <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-30 item" style="background-image: url('<?php echo base_url('assets/front/')?>images/bg_3.jpg');" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <span class="subheading-sm">Welcome</span>
                        <h2 class="heading">Food &amp; Drinks</h2>
                        <p><a href="#" class="btn py-4 px-5 btn-primary">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
