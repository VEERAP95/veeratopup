<footer id="colophon" class="site-footer " role="contentinfo">
<?php
if($this->session->userdata('login')) {
    $acid=$this->session->userdata('email');
    $this->load->helper('myfunction');
    $aax = GetDingApi();
    $jsonobj= json_encode($aax);
    $obj = json_decode ($jsonobj, true);
    //print_r($jsonobj);
    $paypal_email=$obj["paypal_email"];
    $paypal_email= $paypal_email;
}
?>
            <div class="container">
                <div class="row mb-xlg">
                    <div class="col-sm-6 col-md-3 col-xs-6">
                        <div class="footer-widget text-left">
                            <h3 class="footer-title margin-bottom-30">
                                Quick Links
                            </h3>
                            <nav>
                                <ul class="footer-menu left-arrow">
                                    <li><a href="<?php echo base_url() ?>about" title="About Us"> About Us</a></li>
                                    <li><a href="<?php echo base_url() ?>contact" title="Contact Us"> Contact Us</a></li>
                                    <li><a href="<?php echo base_url() ?>faq" title="FAQ">FAQ</a></li>
                                    <li><a href="https://blog.topupfleet.com/" target="_blank" title="Blog">Blog</a></li>
                                </ul>
                            </nav>
                            <h3 class="footer-title margin-bottom-30">
                                Follow Us
                            </h3>
                            <ul class="list-inline social-buttons margin-top-40">
                                <li><a href="https://www.facebook.com/pg/TopUpFleet" target="_blank" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/TopUpFleet" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="https://t.me/TopUpFleet" target="_blank" title="Telegram"><i class="fa fa-telegram"></i></a></li>
                                <li><a href="https://twitter.com/TopUpFleets" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/TopUpFleets/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-6">
                        <div class="footer-widget text-left">
                            <h3 class="footer-title margin-bottom-30">
                                Services
                            </h3>
                            <nav>
                                <ul class="footer-menu left-arrow">

                                    <li><a href="/" title="Recharge"> Recharge</a></li>
                                    
                                <li><a href="/">Plan Check</a></li>
</ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-6 hidden-xs">
                        <div class="footer-widget text-left">
                            <h3 class="footer-title margin-bottom-30">
                                My Account
                            </h3>
                            <nav>
                                <ul class="footer-menu left-arrow">
                                <?php if($this->session->userdata('login')) { ?>
								
                                    <li><a href="<?php echo base_url() ?>home/dashboard" title="Overview"> Overview</a></li>
                                    <li><a href="<?php echo base_url() ?>home/reports" title="Transaction History"> Airtime Transactions</a></li>
                                    <li><a href="<?php echo base_url() ?>home/transactions" title="Transaction History"> Transaction History</a></li>
                                    <li><a href="<?php echo base_url() ?>home/profile" title="My Profile"> My Profile</a></li>
                                    
								<?php
								 }
								 else
								 {
								  ?>
								<li><a href="<?php echo base_url() ?>auth/login" title="Overview"> Overview</a></li>
                                    <li><a href="<?php echo base_url() ?>auth/login" title="Transaction History"> Airtime Transactions</a></li>
                                    <li><a href="<?php echo base_url() ?>auth/login" title="Transaction History"> Transaction History</a></li>
                                    <li><a href="<?php echo base_url() ?>auth/login" title="My Profile"> My Profile</a></li>
                                    <li><a href="<?php echo base_url() ?>auth/login" title="My Contacts"> My Contacts</a></li>
								<?php } ?>
                                    
                                </ul>
                            </nav>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-6 hidden-xs">
                        <div class="footer-widget text-left">
                            <h3 class="footer-title margin-bottom-30">
                                Send Recharge to
                            </h3>
                            <nav>
                                <ul class="footer-menu left-arrow">
                                    <li><a class="selectCountry1" id="PH##+63" title="Send Airtime to Philippines"> Philippines</a></li>
                                    <li><a class="selectCountry1" id="ET##+251" title="Send Airtime to Ethiopia"> Ethiopia</a></li>
                                    <li><a class="selectCountry1" id="MX##+52" title="Send Airtime to Mexico"> Mexico</a></li>
                                    <li><a class="selectCountry1" id="CN##+86" title="Send Airtime to China"> China</a></li>
                                    <li><a class="selectCountry1" id="HT##+509" title="Send Airtime to Haiti">Haiti</a></li>
                                    <li><a class="selectCountry1" id="JM##+1876" title="Send Airtime to Jamaica"> Jamaica</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <a href="https://www.trustpilot.com/review/topupfleet.com" target="_blank"><img src="<?php echo base_url() ?>assets/Content/img/trustpilot.svg" alt="Send mobile recharge worldwide"></a>

                    </div>

                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <span id="siteseal">
                            <script nonce="layoutjavascripts" async="" type="text/javascript" src="getSeal?sealID=x"></script>
                        </span>
                    </div>
                    <div class="col-sm-4 col-md-4 col-xs-4">
                        <a href="https://stripe.com/" target="_blank"><img src="<?php echo base_url() ?>assets/Content/img/stripe-logo-1.png" class="cardlogo" alt="Send mobile recharge worldwide"></a>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-two">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline quicklinks pull-left">
                            <li class="border-right">&copy; 2023 - TopUp Fleet (Trademark of TopUp Fleet Inc). All Rights Reserved.</li>
                        </ul>

                        <ul class="list-inline quicklinks pull-right">
                            <li><a href="<?php echo base_url() ?>privacy-policy">Privacy Policy</a></li>
                            <li><a href="<?php echo base_url() ?>term-conditions">Terms and Conditions</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <input type="image" data-toggle="modal" data-target="#example2Modal" src="<?php echo base_url() ?>assets/Content/img/paypal.png"  alt="PayPal" >
            


        </div>
          </div>
          
      </div>
      
      <div class="modal-body">
          
          <div class="form-group">
          <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
            <input type="image" data-toggle="modal" data-target="#example1Modal" src="<?php echo base_url() ?>assets/Content/img/stripe.png"  alt="Stripe" >
        </div>
          </div>
      </div>
      
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
        <form action="<?php echo base_url('home/wallet'); ?>" method="post">
        <div class="modal fade" id="example1Modal" tabindex="-1" role="dialog" aria-labelledby="example1ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example1ModalLabel">Add Wallet vie Stripe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Amount:</label>
            <input type="number" class="form-control" name="amount" id="recipient-name" autocomplete="off" required>
          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </div>
</div>
        </form>

        <form action="<?php echo base_url('paypal/addwallet'); ?>" method="post">

        
        <div class="modal fade" id="example2Modal" tabindex="-1" role="dialog" aria-labelledby="example2ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example2ModalLabel">Add Wallet vie Paypal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Amount:</label>
            <input type="number" class="form-control" name="amount" id="recipient-name" autocomplete="off" required>
          </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </div>
</div>
        </form>
        <!-- Start of TopUp Fleet Zendesk Widget script -->
        <script nonce="layoutjavascripts" id="ze-snippet" src="ekr/snippet.js?key=x"></script>
        <!-- End of TopUp Fleet Zendesk Widget script -->

    </div>

    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Content/plugins/jQueryUI/jquery-ui.min.js"></script>

    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Content/js/bootstrap.min.js"></script>
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Scripts/LoadingImage.js"></script>
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Content/js/jquery.validate.min.js"></script>
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Content/js/jquery.validate.unobtrusive.min.js"></script>
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Content/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
    <script nonce="layoutjavascripts" src="<?php echo base_url() ?>assets/Scripts/CookiesAlert.js"></script>
    <script nonce="TopUp Fleet">
        var visited = false; var currency = "";

        $(document).ready(function ()
        {
             if (document.location.href.match(/[^\/]+$/)!= null) {
                var url = (document.location.href.match(/[^\/]+$/)[0]);

                if (url.split('?')[0] == "summary" || url == "PaymentMode" || url.split('?')[0] == "gift-card-recipient" || url == "success") {

                    $("#ddlCurrency").prop("disabled", true);
                }
                else {
                    $("#ddlCurrency").prop("disabled", false);

                }
            }
            
            if (window.location.href.split('/')[3] == "" || window.location.href.split('/')[3] == "home") {
                if (sessionStorage.IsFirstVisit != "YES") {
                    $.ajax({
                        url: "/GetUserCountryCodeByIp",
                        dataType: "json",
                        contentType: "application/json",
                        async: false,
                        type: "GET",
                        success: function (data) {
                            if (data != null) {
                                if (data.currency != null)
                                    currency = data.currency.code;
                                sessionStorage.IsFirstVisit = "YES";
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                }
            }

           $.ajax({
               url: "/GetSupportedCurrecyInSwift",
               dataType: "json",
               contentType: "application/json",
               async: false,
               type: "GET",
               success: function (data) {
			   debugger;
                   if (data != null) {
                       var Currencies = JSON.parse(data);
                       var htmlCurrencies = "";
                       for (var i = 0; i < Currencies.Data.length; i++) {
                                htmlCurrencies += "<option value=" + Currencies.Data[i].currency + ">" +
                                    (Currencies.Data[i].currencySign + Currencies.Data[i].currency) + "</option>";
                            }
                       $("#ddlCurrency").html(htmlCurrencies);
                       if (currency != "")
                       {
                           if ('USD' != null && 'USD' != 'USD') {
                               currency = 'USD';
                               checkCurrencyStatus(currency);
                           }
                           else {
                               
                               $("#ddlCurrency").val('USD');
                           }

                       }
                       else {
                           checkCurrencyStatus('USD');
                       }
                   }
               },
               error: function (error) {
                   console.log(error);
               }
           })


        })


        function checkCurrencyStatus(obj) {
            var isInList = false;
            $("#ddlCurrency option").each(function () {
                if ($(this).val() == obj)
                    isInList = true;
            })
            if (isInList)
                $("#ddlCurrency").val(obj);
            else
                $("#ddlCurrency").val("USD");
        }

    </script>
</body>
</html>
