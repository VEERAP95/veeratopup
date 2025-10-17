<?php include("header.php"); ?>

<section id="" class="section recharge-mobile">
    <div class="container text-center">

        <h2 class="">Summary</h2>
        <span class="section-divider"></span>
    </div>
    <div class="container">
        <div id="wizardStepOperatorProducts">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-xs-12">

                    <div class="row margin-bottom-5">
                        <div class="col-md-3 col-xs-4 padding-right-0">


                            <label class="">Country </label>


                        </div>
                        <div class="col-md-9 col-xs-8 padding-left-0 text-right">
                            <img style="width:30px;" src="<?php echo base_url() ?>assets/Content/img/flags/svg/<?php echo strtolower($data->Items[0]->CountryIso); ?>.svg" alt="Send mobile recharge worldwide" />
                            <label class="" id="lblCountry"><?php echo $data->Items[0]->Name; ?></label>
                        </div>
                    </div>
                    <div class="row margin-bottom-5">
                        <div class="col-md-3 col-xs-4 padding-right-0">

                            <label class="">Phone No.</label>

                        </div>
                        <div class="col-md-9 col-xs-8 text-right padding-left-0">
                            <i class="fa fa-mobile" aria-hidden="true"></i> <label> +<?php echo $mobile; ?></label>
                        </div>
                    </div>
                    <div class="row margin-bottom-5">
                        <div class="col-md-3 col-xs-4 padding-right-0">

                            <label class=""> Operator </label>
                        </div>
                        <div class="col-md-9 col-xs-8 text-right padding-left-0">
                            <img style="width:32px" class="product-img" src="<?php echo $data->Items[0]->LogoUrl; ?>" alt="Send mobile recharge worldwide" /> <label>  <?php echo $data->Items[0]->Name; ?></label>
                                    <div class="dropdown pull-right" id="DIVeditOperator">
                                        <button class="btn btn-link" type="button" id="btnEditOperator" data-toggle="tooltip" title="Change Operator">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </div>
                        </div>
                    </div>

                </div>

            </div>
            <script nonce="swiftreload" type="text/javascript">
                window.onload = function () {
                    var seconds = 10;
                    setTimeout(function () {
                        $("#lblMSG").fadeOut("slowly");
                        //$("#lblMSG").css("display","none");
                    }, seconds * 1000);
                };
            </script>

                                             <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-xs-12">
                                        <style>
    

    .moretext {
        display: none;
    }
</style>
<script nonce="swiftreload" type="text/javascript">
    $(document).ready(function () {

        $('.moreless-button').click(function () {
            $('.moretext').slideToggle();
            if ($('.moreless-button').text().trim() == "Show More") {
                
                $(this).html('Show Less <i class="fa fa-angle-up"></i>');
            } else {
              
                $(this).html('Show More <i class="fa fa-angle-down"></i>');
                    
            }
        });
    })
</script>



                                    </div>
                                    </div>

                                        <div id="DIVproductList" style="display:block">
                                            <ul class="nav nav-tabs margin-top-15">
    <li class="active">
        <a data-toggle="tab" href="#Topup">Mobile Recharge</a>
    </li>
    <li>
        <a data-toggle="tab" href="#Data">Data Bundles</a>
    </li>
</ul>



<div class="tab-content">
    <div id="Topup" class="row tab-pane fade in active">
    <?php
            if (isset($data2) && !empty($data2)) {
                foreach ($data2["Items"] as $row) {
                    
                    ?>
                    <form action="<?php echo base_url('home/summary'); ?>" method="post" >
                    <input type="hidden" name="skucode" value="<?php echo $row["SkuCode"]; ?>">
                    <input type="hidden" name="mobile" value="<?php echo $mobile; ?>">
                    <input type="hidden" name="logo" value="<?php echo $data->Items[0]->LogoUrl; ?>">
                    <input type="hidden" name="opt" value="<?php echo $data->Items[0]->Name; ?>">
                    <input type="hidden" name="amount" value="<?php echo $row["Maximum"]["ReceiveValue"]; ?>">
                    <input type="hidden" name="currency" value="<?php echo $row["Maximum"]["ReceiveCurrencyIso"]; ?>">
                    <input type="hidden" name="benefit" value="<?php echo $row["DefaultDisplayText"]; ?>">
                    <input type="hidden" name="price" value="<?php echo $row["Maximum"]["SendValue"]; ?>">
                    <input type="hidden" name="SendCurrencyIso" value="<?php echo $row["Maximum"]["SendCurrencyIso"]; ?>">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="product-column">
                                <div class="product">
                                    <div class="product-description">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <img class="product-image" src=<?php echo $data->Items[0]->LogoUrl; ?> />
                                            </div>
                                            <div class="col-xs-9 padding-left-0">
                                                <div class="product-name">
                                                    <label><?php echo $data->Items[0]->Name; ?></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <!-- <span class="productID" hidden>28546 </span> -->

                                            <div class="pull-left">
                                                <div class="product-price-receive">
                                                    <i class="fa fa-phone"></i> Product

                                                </div>
                                                <div class="product-price-value">
                                                    <div class="product-price">
                                                    <?php echo $row["Maximum"]["ReceiveValue"]; ?>
                                                        <span class="product-currency"><?php echo $row["Maximum"]["ReceiveCurrencyIso"]; ?> </span>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="pull-right">
                                                <div class="product-price-cost">
                                                    <i class="fa fa-money"></i> Costs
                                                </div>

                                                <div class="product-price">
                                                <?php echo $row["Maximum"]["SendValue"]; ?>
                                                    <span class="product-currency"><?php echo $row["Maximum"]["SendCurrencyIso"]; ?></span>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-xs-12">
                                            <div class="text-center product-price-receive">
                                                <span class="product-Benefits text-info"><?php echo $row["DefaultDisplayText"]; ?></span>
                                                
                                            </div>
                                            <div class="text-center product-price-receive"><input type="submit" class="product-Benefits text-danger" name="submit" value="Recharge"></div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <?php
                }
            } else {
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                 <label class="alert alert-info">No Recharge Bundle Product Available.</label>
               </div>
            <?php } ?>
                        



        <div class="clearfix"></div>
    </div>


    <div id="Data" class="tab-pane fade in">

              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                 <label class="alert alert-info">No Data Bundle Product Available.</label>
               </div>


    </div>
            </div>




                                        </div>
                                        
               </div>
           </div>


                    <style>
                    </style>
</section>

<?php include("footer.php"); ?>