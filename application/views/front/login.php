     
 <!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        

        Top up | Recharge | Online mobile recharging

    </title>
    

    <meta name="description" content="recharge digicel top up telcel recarga mobile recharge metropcs pay bill buy gift card online mobile recharge recharge mobiles online mobile top-up online mobile recharging digicel top up mobile recharge ultra mobile recharge data ultra mobile recharge card ultra online recharge mobile easy recharge recharge your phone online">


    <meta name="google-site-verification" content="1234567890-google">
    <meta name="keywords" content="recharge digicel top up telcel recarga mobile recharge metropcs pay bill buy gift card online mobile recharge recharge mobiles online mobile top-up online mobile recharging digicel top up mobile recharge ultra mobile recharge data ultra mobile recharge card ultra online recharge mobile easy recharge recharge your phone online">
    <meta name="author" content="topupfleet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="content-language" content="en-gb">
    <meta property="og:title" content="Top up | Recharge | Refill phone | etopup online">
    
    
    <meta property="og:description" content="Best value on Digicel recharge. Buy airtime credit online. Refill any prepaid US number instantly. International etopup online.">

    <meta property="og:image" content="https://topupfleet.com/Content/img/mobile-recharge.png">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="TopUp Fleet">

    <meta name="twitter:card" content="summary">
    

    <meta name="twitter:title" content="Top up | Recharge | Refill phone | etopup online">

    
    <meta name="twitter:description" content="recharge digicel top up telcel recarga mobile recharge metropcs pa&#39;y bill buy gift card online mobile recharge recharge mobiles online mobile top-up online mobile recharging digicel top up mobile recharge ultra mobile recharge data ultra mobile recharge card ultra online recharge mobile easy recharge recharge your phone online">


    <meta name="twitter:url" content="https://topupfleet.com/">
    <meta name="twitter:image" content="https://topupfleet.com/Content/img/mobile-recharge.png">

    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Content/js/jquery-3.3.1.min.js"></script>
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Content/js/bootstrap.min.js"></script>
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Content/js/jquery.validate.min.js"></script>
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Content/js/jquery.validate.unobtrusive.min.js"></script>
    <link href="<?php echo base_url() ?>assets/Content/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/app-pageStyles.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/agency.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/Content/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Scripts/jquery-1.11.1.min.js"></script>
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Scripts/LoadingImage.js"></script>
    
    <link href="<?php echo base_url() ?>assets/Content/css/toastr.min.css" rel="stylesheet">
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Scripts/toastr.min.js"></script>
    <script nonce="TopUp Fleet" src="<?php echo base_url() ?>assets/Scripts/ToastrAlert.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>


    <script nonce="scrptSignin">
       $(document).ready(function () {
           if (''!= '') {
               ToastrWarning('');
           }

            if (''!= '') {
                ToastrSuccess('');
           }


           if (''!= '') {
               ToastrSuccess('');
           }

           if (''!= '') {
               ToastrSuccess('');
           }

           if (''!= '') {
               ToastrSuccess('');
           }
         if (''!= '') {
               ToastrSuccess('');
           }
           if (''!= '') {
               ToastrSuccess('');
           }


           $('#LnkResendEmailActivationLink').click(function () {

                  var Email = $("#txtLoginMobOREmail").val();

               if (txtLoginMobOREmail != '') {

                   var url = "SendEmailActivation?Email=" + Email;
                   window.location.href = url;
               }
               else {
                   $("#SpErrorMsg").text('Please enter email.');
                   $("#txtLoginMobOREmail").focus();
               }
           });

       });

    </script>

</head>
<body class="">

    <div id="loading-image">
        <img id='demo_wait' src="<?php echo base_url() ?>assets/Content/img/trnDataProgress.gif" alt='Processing...' class="ajax-loader">
    </div>
    <section class="">
        <div class="container">
<form action="<?php echo base_url() ?>auth/login" method="post">
                   <div id="pnlloginbox" class="mainbox">
                    <div class="login-box">
                        <div class="login-logo">
                            <a href="<?php echo base_url() ?>home"><img src="<?php echo base_url() ?>assets/Content/img/Company-logo.png" width="300" alt="Send mobile recharge worldwide"> </a>
                        </div>
                        <div class="login-box-body">
                        <?php
        if($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('error').'</div>';
        }
        if($this->session->flashdata('success')) {
            echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('success').'</div>';
        }
        ?>
                            <h3 class="text-center margin-top-5">
                                Login
                            </h3>
                            <p class="text-center">
                                New to TopUp Fleet?
                                <a href="register">Sign Up</a>
                            </p>
                            <hr>



                            <div class="form-group">
                                <label id="lblSignInFail" class="error-msg hidden"></label>

                                <input class="form-control input-lg text-box single-line" data-val="true" data-val-regex="Entered email format is not valid." data-val-regex-pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}" data-val-required="Please enter your email" id="txtLoginMobOREmail" name="Email" placeholder="Email" type="text" value="">
                                <span class="field-validation-valid error-msg" data-valmsg-for="Email" data-valmsg-replace="true"></span>

                            </div>

                            <div class="form-group">

                                <input class="form-control input-lg text-box single-line password" data-val="true" data-val-required="Please enter password" id="txtLoginPassword" name="Password" placeholder="Password" type="password" value="">
                                <span class="field-validation-valid error-msg" data-valmsg-for="Password" data-valmsg-replace="true"></span>

                            </div>
                            <div class="form-group">

                                

                                <span class="error-msg" id="SpErrorMsg"></span>


                                                                                                                                                                                                 </div>
<div align="center" class="g-recaptcha" data-sitekey="6LeejYEUAAAAAOHP-Y6tgyyPvqPTyFZUAQUiBhYq"></div>

                            <div class="form-group text-center">
                                <input class="btn btn-theme btn-shadow btn-curved btn-block btn-lg" id="btnLogin" type="submit" name="submit" value="Login">



                            </div>
                            <div class="row mb-lg">
                                <div class="col-xs-12 text-right">
                                    <a class="btn-link" href="#">
                                        <i class="fa fa-angle-right"></i>
                                        <a href="forgot">Forgot Password?</a>
                                    <br>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>
                <input type="hidden" id="foo" name="foo">
</form>             <p class="text-center hidden-xs small text-muted">&copy; 2023 - TopUp Fleet (Trademark of TopUp Fleet Inc). All Rights Reserved.</p>
        </div>

    </section>


</body>
</html>
