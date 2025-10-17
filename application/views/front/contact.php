<?php include("header.php"); ?>

<section id="" class="">
    <div class="container text-center">
        <h2 class="">
            Get In Touch
        </h2>
        <span class="section-divider"></span>
    </div>



    <div class="container">
<form action="/contact" method="post">            <div class="row">
                <div class="col-md-offset-3 col-md-6">



                    <div class="form-group">
                        <textarea class="form-control input-lg text-box multi-line" cols="30" data-val="true" data-val-required="Please type message" id="message" name="Message" placeholder="Enter Message" rows="5">
</textarea>
                        <span class="field-validation-valid error-msg" data-valmsg-for="Message" data-valmsg-replace="true"></span>
                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control input-lg text-box single-line" data-val="true" data-val-required="Please type your name" id="name" name="YourName" placeholder="Enter Your Name" type="text" value="">
                                <span class="field-validation-valid error-msg" data-valmsg-for="YourName" data-valmsg-replace="true"></span>
                                
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <input class="form-control input-lg text-box single-line" data-val="true" data-val-required="Please type email id" id="email" name="EmailAddress" placeholder="Email" type="email" value="">
                            <span class="field-validation-valid error-msg" data-valmsg-for="EmailAddress" data-valmsg-replace="true"></span>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control input-lg text-box single-line" data-val="true" data-val-maxlength="Mobile Number must be at maximum 12" data-val-maxlength-max="12" data-val-minlength="Mobile Number must be at least 8" data-val-minlength-min="8" data-val-required="Please type contact number" id="ContactNumber" name="ContactNumber" placeholder="Enter Mobile" type="number" value="">
                        <span class="field-validation-valid error-msg" data-valmsg-for="ContactNumber" data-valmsg-replace="true"></span>
                        
                    </div>


                    <div class="form-group">
                        <textarea class="form-control input-lg text-box multi-line" data-val="true" data-val-required="Please type subject" id="subject" name="Subject" placeholder="Enter Subject" type="text">
</textarea>
                        <span class="field-validation-valid error-msg" data-valmsg-for="Subject" data-valmsg-replace="true"></span>
                        
                    </div>


                    


                    <div class="form-group">

                    </div>


                    <div class="form-group mt-3 text-center">

                        <input class="btn btn-theme btn-block btn-shadow btn-lg btn-curved" formaction="/contact" formmethod="post" type="submit" value="Send">
                        
                    </div>


                </div>
            </div>
            <input type="hidden" id="foo" name="foo">
</form>    </div>
</section>



<?php include("footer.php"); ?>