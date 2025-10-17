<?php include("header.php"); ?>

<section id="" class="section">
        <div class="container text-center">

            <h2 class="">
                My Profile
            </h2>
            <span class="section-divider"></span>
        </div>
        <div class="container">
<form action="<?php echo base_url() ?>home/profile_save" method="post">                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">

                        <div class="form-horizontal">
                            
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <lable class="info-box-text">
                                        Name
                                    </lable>

                                    <span class="info-box-number">
                                    <?php echo $data['name']; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <lable class="info-box-text">
                                        Email
                                    </lable>

                                    <span class="info-box-number">
                                    <?php echo $data['email']; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <lable class="info-box-text">
                                        Mobile
                                    </lable>

                                    <div id="spanMobile" class="info-box-number" style="display:block">
                                    <?php echo $data['mobile']; ?>
                                            
                                        <!-- <input type="button" class="btn btn-default btn-curved btn-sm pull-right" value="Edit" id="btnEditMobile" /> -->
                                    </div>
                                    <div id="spanmobileEdit" class="info-box-number disabled" style="display:none">
                                        <div class="row">
                                            <div class="col-xs-3 padding-right-0">
                                                <span class="select-box-arrow">
                                                    <select id="ddlDialCode" class="select-hr form-control" style="display:none" name="MobileCode"></select>
                                                </span>
                                            </div>
                                            <div class="col-xs-5 padding-left-0">
                                                <input class="text-box single-line" id="Mobile" name="Mobile" type="text" value="<?php echo $data['mobile']; ?>" />
                                            </div>
                                            <div class="col-xs-4 padding-left-0 text-right">
                                                <input type="submit" value="Save" class="btn btn-theme btn-curved btn-sm" id="btnSave" formaction=/profile formmethod="post" />
                                                <input type="button" value="Cancel" class="btn btn-danger btn-curved btn-sm" id="btnClacel" />
                                            </div>
                                            <div class="col-xs-12">
                                                <span class="field-validation-valid error-msg" data-valmsg-for="Mobile" data-valmsg-replace="true"></span>
                                            </div>

                                        </div>
                                        </div>
                                    <div class="form-group text-center">
                                        <span class="error-msg"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-center margin-top-15">
                            <a class="btn btn-default btn-lg btn-curved btn-block" href="<?php echo base_url() ?>home/dashboard">Back</a>
                        </div>



                    </div>
                </div>
</form>            </div>
</section>
<script nonce="scrptMyProfile">
    $(document).ready(function () {
        
        $.ajax({
            url: "/GetCountryListAT",
            dataType: "json",
            contentType: "application/json",
            async: false,
            type: "GET",
            success: function (data) {
                if (data != null)
                {
                    var Currencies = JSON.parse(data); var htmlCurrencies = "";
                    for (var i = 0; i < Currencies.length; i++)
                    {
                        htmlCurrencies += "<option value=" + Currencies[i].DialCode + ">" + Currencies[i].DialCode + "</option>";
                    }
                    $("#ddlDialCode").html(htmlCurrencies);
                }
            },
            error: function (error) {
                console.log(error);
            }
        })
        $('#btnEditMobile').click(function () {
            debugger;
            $('#ddlDialCode').val($('#spanMobile').text().trim().split('-')[0]);
            $('#ddlDialCode').show();
            $('#spanmobileEdit').show();
            $('#spanMobile').hide();
        });

        $('#btnClacel').click(function () {
            $('#spanmobileEdit').hide();
            $('#ddlDialCode').hide();
            $('#spanMobile').show();

        });
    });

   
    </script>
<?php include("footer.php"); ?>