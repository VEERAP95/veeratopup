<?php include("header.php"); ?>
<form action="<?php echo base_url('my-stripe'); ?>" method="post">   
<input type="hidden" name="skucode" value="<?php echo $skucode; ?>">
<input type="hidden" name="mobile" value="<?php echo $mobile; ?>">
<input type="hidden" name="opt" value="<?php echo $opt; ?>">
<input type="hidden" name="amount" value="<?php echo $price; ?>">
<input type="hidden" name="currency" value="<?php echo $currency; ?>">
<section id="" class="section order-summary">
        <div class="container text-center">
        
            <h2 class="">
                Order Summary
            </h2>
            <span class="section-divider"></span>
        </div>

        <div class="container">
            <div id="pnlSummary">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-xs-12">

                        <div class="checkout-details">
                                    <div class="row margin-bottom-5">
                                        <div class="col-md-4 col-xs-5 padding-right-0">
                                            <label class="">Receiver Mobile</label>
                                        </div>
                                        <div class="col-md-8 col-xs-7 text-right padding-left-0">
                                            <label id="lblReceiverMobile" class="country-label">
                                                <i class="fa fa-mobile" aria-hidden="true"></i>
                                                +<?php echo $mobile; ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-5">
                                        <div class="col-md-3 col-xs-4 padding-right-0">
                                            <label class="">Operator</label>
                                        </div>
                                        <div class="col-md-9 col-xs-8 text-right padding-left-0">

                                            <img id="imgProductOperatorImage" style="min-height:20px;height:20px;width:30px;" class="" src="<?php echo $logo; ?>" alt="Product's Operator'" />
                                            <label id="lblOperatorName"><?php echo $opt; ?></label>

                                        </div>
                                    </div>

                            <div class="row margin-bottom-5 hidden">
                                <div class="col-md-3 col-xs-4 padding-right-0">
                                    <label class="">Country</label>
                                </div>
                                <div class="col-md-9 col-xs-8 padding-left-0 hidden">

                                    <label id="lblCountryLabel" class="country-label">India</label>

                                </div>
                            </div>
                            <div class="row margin-bottom-5">
                                <div class="col-md-4 col-xs-5 padding-right-0">
                                    <label class="">Product Amount</label>
                                </div>
                                <div class="col-md-8 col-xs-7 padding-left-0 text-right">

                                        <label id="lblProduct" class="country-label"><?php echo $amount; ?> <?php echo $currency; ?></label>


                                </div>
                            </div>
                            <div class="row margin-bottom-5 bor-bo pb-sm">
                                <div class="col-md-3 col-xs-4 padding-right-0">
                                    <label class="">Benefits</label>
                                </div>
                                <div class="col-md-9 col-xs-8 padding-left-0 text-right text-danger">

                                        <label id="lblTopupAmount"><?php echo $data->Items[0]->DescriptionMarkdown; ?></label>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-xs-4 padding-right-0">
                                    <label class="">Price</label>
                                </div>
                                <div class="col-md-9 col-xs-8 padding-left-0 text-right">

                                        <label id="lblPrice"><?php echo $price; ?> <?php echo $SendCurrencyIso; ?></label>

                                </div>


                            </div>


                            <div class="panel " hidden>

                                <div class="panel-body bg-info" hidden>
                                    <div class="margin-bottom-10">


                                        <input id="chkPersonalMessage" type="checkbox" name="PersonalMessage"> <label for="chkPersonalMessage">
                                            Send a wish message to receiver.
                                        </label>
                                        <label id="lblFeeTextMessage" Text="" class="text-bold"></label>

                                    </div>
                                    <div id="PnlMessageForReceiver" hidden>
                                        <input type="text" id="txtsmsTexttoReceiver" maxlength="25" placeholder="Please enter max 25 and no special characters here." class="form-control" />
                                    </div>
                                </div>
                            </div>



                            <div class="row bor-bo pb-sm">
                                <div class="col-xs-7"><span class="">Fee</span></div>
                                <div class="col-xs-5 text-right"> <label id="lblTopupFee">0.00 USD</label> </div>
                            </div>

                            <div class="row bor-bo pt-sm pb-sm" id="DivPersonalTextMessageFee" hidden>
                                <div class="col-xs-8"><label>Personal Text Message Fee</label></div>
                                <div class="col-xs-4 text-right"> <label id="lblPersonalTextMessageFee">USD</label> </div>
                            </div>

                            <div class="row bg-light-gray">
                                <div class="col-xs-7">
                                    <h4 class="mt-sm">Total</h4>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <h4 class="text-success mt-sm">
                                        <label id="lblTotalAmountWithCurrency"><?php echo $price; ?> <?php echo $SendCurrencyIso; ?></label>
                                    </h4>

                                </div>
                            </div>
                            <?php 
define('ProPayPal', $PayPalENV);
if(ProPayPal){
	define("PayPalClientId", $PayPalClientId);
	define("PayPalSecret", $PayPalSecret);
	define("PayPalBaseUrl", "https://api.paypal.com/v1/");
	define("PayPalENV", "production");
} else {
	define("PayPalClientId", $PayPalClientId);
	define("PayPalSecret", $PayPalSecret);
	define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
	define("PayPalENV", "sandbox");
}
$productName = "Demo Product";
$currency = "USD";
$productId = 123456;
//$orderNumber = 000999;
?>
<div class="container">	
	<br>
	
	
</div>
<?php ?>

                                <div class="row margin-top-20">
                                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                                        <input class="btn btn-theme btn-block btn-lg btn-curved btn-shadow"  value="Proceed to Payment" data-toggle="modal" data-target="#PaymentModal"/>
                                        <input type="submit" id="BtnCancel" name="Cancel" value="Cancel Recharge" formaction=/home formmethod="post" class="btn btn-link btn-block btn-lg" />
                                    </div>
                                </div>


                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </section>
</form>

<div class="modal fade" id="PaymentModal" tabindex="-1" role="dialog" aria-labelledby="PaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PaymentModalLabel">Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row margin-top-20">
        


      <center>
          <div id="paypal-button-container"></div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
  env: '<?php echo PayPalENV; ?>',
  client: {
	<?php if(ProPayPal) { ?>  
	production: '<?php echo PayPalClientId; ?>'
	<?php } else { ?>
	sandbox: '<?php echo PayPalClientId; ?>'
	<?php } ?>	
  },
  payment: function (data, actions) {
	return actions.payment.create({
	  transactions: [{
		amount: {
		  total: '<?php echo $price; ?>',
		  currency: '<?php echo $currency; ?>',
		}
        
	  }
    ]
	});
  },
  onAuthorize: function (data, actions) {
	return actions.payment.execute()
	  .then(function () {
		window.location = "<?php echo base_url('paypal'); ?>?paymentID="+data.paymentID+"&s=<?php echo $skucode; ?>&m=<?php echo $mobile; ?>&o=<?php echo $opt; ?>&a=<?php echo $price; ?>&e=<?php echo $email; ?>&item_name=Recharge";
	  });
  }
}, '#paypal-button');
</script>
        </center>


      
      </div>
       
      </div>
      <div class="row margin-top-20">
      <form action="<?php echo base_url('my-stripe'); ?>" method="post">
      <input type="hidden" name="skucode" value="<?php echo $skucode; ?>">
<input type="hidden" name="mobile" value="<?php echo $mobile; ?>">
<input type="hidden" name="opt" value="<?php echo $opt; ?>">
<input type="hidden" name="amount" value="<?php echo $price; ?>">
<input type="hidden" name="currency" value="<?php echo $currency; ?>">
                                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
                                        <input class="btn btn-theme btn-block btn-lg btn-curved btn-shadow" id="btnProceedForToupPayment" type="submit" value="Credit Card / Debit Card" />
                                        
                                    </div>
                                    </form>
                                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>    
        
<?php include("footer.php"); ?>