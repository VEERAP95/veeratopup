<?php include("header.php"); ?>



<section id="" class="section padding-bottom-20">
    <div class="container text-center">
        <h2 class=""> International Promotions  </h2>
        <span class="section-divider"></span>
        <span id="Lblmsg"></span>
        <div class="row">
<form action="/promotions" method="post">                <div class="col-md-5 col-sm-5 col-xs-12">
                    <span class="select-box-arrow-lg">
                        <select id="ddlCountry" onchange="getAllProvidersOfCountry();" class="form-control input-lg" name="country"> <option value="India">India</option> </select>
                    </span>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <span class="select-box-arrow-lg">
                        <select id="ddlOperator" class="form-control input-lg" name="operator">
                            <option value="0">Select Operator</option>
                        </select>
                    </span>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <button type="submit" class="btn btn-theme btn-lg btn-block btn-curved btn-shadow">Search</button>
                </div>
</form>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>