<?php include("header.php"); ?>
<?php
        if($this->session->flashdata('error')) {
            echo '<script>
            $(document).ready(function(){
              toastr.warning("Record Not Updated", "'.$this->session->flashdata('error').'");
              });
            </script>';
        }
        if($this->session->flashdata('success')) {
            echo '<script>
            $(document).ready(function(){
              toastr.success("Record Updated", "'.$this->session->flashdata('success').'");
              });
            </script>';
        }
        ?>
    <style>
        .divider {
  font-size: 30px;
  display: flex;
  align-items: center;
}

.divider::before, .divider::after {
  flex: 1;
  content: '';
  padding: 1px;
  background-color: green;
  margin: 5px;
}
    </style>    
<div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">API</a></li>
                                <li class="breadcrumb-item active">API Setting</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">API Setting</h1>
                                    <small>From now on you will start your activities.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">API Setting</h6>
                                    </div>
                                    <div class="text-right">
                                        <div class="actions">
                                            <a href="#" class="action-item"><i class="ti-reload"></i></a>
                                            <div class="dropdown action-item" data-toggle="dropdown">
                                                <a href="#" class="action-item"><i class="ti-more-alt"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">Refresh</a>
                                                    <a href="#" class="dropdown-item">Manage Widgets</a>
                                                    <a href="#" class="dropdown-item">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="<?php echo base_url('admin/api_update'); ?>" method="post">
                            <div class="divider">Ding Connect API</div>
                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Ding API Key</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['ding_key']; ?>" id="ding_key" name="ding_key" placeholder="Ding API Key">
                                            </div>
                                        </div>
                                        <div class="divider">Stripe Payment Getway</div> 
                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Stripe Key</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['stripe_key']; ?>" id="stripe_key" name="stripe_key" placeholder="Stripe Key">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Stripe Secret</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['stripe_secret']; ?>" id="stripe_secret" name="stripe_secret" placeholder="Stripe Secret">
                                            </div>
                                        </div>
                                        <div class="divider">Paypal Payment Getway</div> 
                                        <!-- <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Paypal Email Id</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['paypal_email']; ?>" id="paypal_email" name="paypal_email" placeholder="Paypal Email Id">
                                            </div>
                                        </div> -->

                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Paypal Client Id</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['PayPalClientId']; ?>" id="PayPalClientId" name="PayPalClientId" placeholder="Paypal Client">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Paypal Secret</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['PayPalSecret']; ?>" id="PayPalSecret" name="PayPalSecret" placeholder="Paypal Secret">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">Type</label>
                                            <div class="col-sm-9">
                                            <select class="form-control" name="PayPalENV" required="">
																		<option value="">--Select--</option>
																		<option value="0" <?php if ($data['PayPalENV']=='0') {
                                                                            echo 'selected';
                                                                        } ?>>Sandbox</option>
																		<option value="1" <?php if ($data['PayPalENV']=='1') {
                                                                            echo 'selected';
                                                                        } ?>>Production</option>
                                                                        
																		</select>
                                            </div>
                                        </div>
                                        
                                        

                                    <p align="right">
                                    <button type="submit" name="submit" class="btn btn-labeled btn-danger mb-2 mr-1">
                                            <span class="btn-label"><i class="far fa-save"></i></span>Save API Setting
                                        </button>
                                    </p>

                                    </form>
                            
                        </div>
                    </div><!--/.body content-->
                     
                </div><!--/.main content-->
<?php include("footer.php"); ?>