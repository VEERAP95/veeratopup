<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <title>Mobile Recharge | Buy Gift Cards Online</title>
            <meta name="description" content="Send mobile recharge and gift cards instantly to 160 countries and stay connected with your beloved ones. Pay safely with bank cards and crypto currencies!">
            <meta name="keywords" content=" topupfleet  recharge, gift cards, online topup, monile recharge, pay online bills, metropcs bill payment, crypto payment, bitcoin pay, gift cards with bitcoin, ultra mobile recharge, digicel top up, digicel topup, digicel online topup, digicel online top up, recarga, recargas, recarga telcel, recargas telcel, telcel recarga, telcel recargas, recarga movistar, tmobile, verizon top up, boost mobile topup, phone refill, recharge online, online recharge,  phone top up, international mobile topup, top up uzbekistan, top up beeline, top up banglalink, reload phones, phone reload, smart reload, phone loads">

    <meta name="author" content="topupfleet">
    <meta http-equiv="content-language" content="en-gb">
    <meta name="google-site-verification" content="1234567890-google">

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="classification" content="Mobile Recharge">
    <meta name="robots" content="index, follow">
    <meta name="language" content="EN-US">
    <meta name="culture" content="en">
    <meta name="theme-color" content="#3979b9">

    <meta property="og:url" content="https://topupfleet.com/">

        <meta property="og:title" content="Mobile Recharge | Buy Gift Cards Online">
            <meta property="og:description" content="Send mobile phone recharge and gift cards instantly to 160 countries and stay connected with your beloved ones. Pay safely with bank cards and crypto currencies!">

    <meta property="og:image" content="<?php echo base_url() ?>assets/Content/img/mobile-recharge.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="TopUp Fleet">

    <meta name="twitter:card" content="summary">

        <meta name="twitter:title" content="Mobile Recharge | Buy Gift Cards Online">
            <meta name="twitter:description" content="Send mobile phone recharge and gift cards instantly to 160 countries and stay connected with your beloved ones. Pay safely with bank cards and crypto currencies!">

    <meta name="twitter:url" content="https://topupfleet.com/">
    <meta name="twitter:image" content="<?php echo base_url() ?>assets/Content/img/mobile-recharge.png">

    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Scripts/jquery-3.3.1.min.js"></script>

    <link rel="canonical" href="index.htm">
    <link href="<?php echo base_url() ?>assets/Content/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Content/plugins/jQueryUI/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/Content/css/bootstrap-select.min.css">
    <link href="<?php echo base_url() ?>assets/Content/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/app-pageStyles.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/agency.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Content/js/jquery-2.2.3.min.js"></script>
    <!-- TrustBox script -->
    <script type="text/javascript" nonce="layoutjavascripts" src="bootstrap/v5/tp.widget.bootstrap.min.js" async=""></script>
    
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Scripts/ChangeCurrency.js"></script>    

    <noscript> </noscript>

    <div id="page" class="site">
        <div class="top-menu">
            <nav class="navbar navbar-theme navbar-fixed-top" data-spy="affix" data-offset-top="100">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo base_url() ?>home">
                            <img src="<?php echo base_url() ?>assets/Content/img/Company-logo.png" alt="Send mobile recharge worldwide" title="Send mobile Recharge worldwide">
                        </a>
                        
                            
                    </div>







                    <div class="navbar-collapse collapse navbar-right">
                        <ul class="nav navbar-nav">

                                <li><a href="<?php echo base_url() ?>home">Recharge</a></li>
                                <!-- <li><a href="<?php echo base_url() ?>buy-gift-cards">Gift Cards</a></li> -->
                                <li><a href="<?php echo base_url() ?>promotions" title="Promotions">Promotions</a></li>
                                <?php if($this->session->userdata('login')) { ?>
								
                                    <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="My Account">
                                        My Account
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                                <a href="<?php echo base_url() ?>home/profile" class="" style="padding-top:5px; padding-bottom:5px;" title="">
                                                    <h5 class="margin-bottom-0">Welcome back</h5>
                                                    <label class="small"><?php echo $this->session->userdata('name'); ?></label>
                                                </a>

                                        </li>

                                        <li class="divider"></li>
                                        <li>

                                            <a href="#" class="" data-toggle="modal" data-target="#exampleModal" title="Wallet">
                                                Wallet : $ <?php
if($this->session->userdata('login')) {
    $acid=$this->session->userdata('email');
    $this->load->helper('myfunction');
    $Balance = GetWallet($acid);
    $jsonobj= json_encode($Balance);
    $obj = json_decode ($jsonobj, true);
    $dmt_bal=$obj[0]["wallet"];
    echo $dmt_bal;
}else{
    echo '0.00';
}
?>
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>

                                            <a href="<?php echo base_url() ?>home/dashboard" class="" title="Dashboard">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>home/reports" class="" title=" AirTimeTransactions ">
                                                AirTime   Transactions
                                            </a>

                                        </li>
                                        
                                        <li>
                                        <a href="<?php echo base_url() ?>home/transactions" title="Promotions">Transaction Reports</a>
                                        </li>


                                        <li>
                                            <a href="<?php echo base_url() ?>home/profile" class="" title="My Profile">
                                                My Profile
                                            </a>
                                        </li>
                                        
                                        </ul>
                                </li>
                                
                                <li>
                                    <a class="btn btn-danger btn-curved btn-shadow navbar-btn margin-horiz-20" href="<?php echo base_url() ?>auth/logout">Logout</a>
                                    <div class="floating-btn visible-xs">
                                        <a class="btn btn-theme btn-block" href="">Recharge</a>
                                    </div>
                                </li>
								<?php
								 }
								 else
								 {
								  ?>
								<li><a href="auth/register">Sign Up</a></li>
                                <li><a class="btn btn-theme btn-curved btn-shadow navbar-btn margin-horiz-10" href="auth/login">My Account</a></li>
                                <li>
                                

                                </li>
								<?php } ?>

                        </ul>
                        

                        
                    </div>
                </div>
            </nav>
        </div>