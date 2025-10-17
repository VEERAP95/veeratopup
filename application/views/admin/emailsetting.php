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
        
<div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Email</a></li>
                                <li class="breadcrumb-item active">SMTP Setting</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">SMTP Setting</h1>
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
                                        <h6 class="fs-17 font-weight-600 mb-0">SMTP Setting</h6>
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
                            
                            <form action="<?php echo base_url('admin/emailsetting_save'); ?>" method="post">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label font-weight-600">Type</label>
                                            <div class="col-sm-9">
                                            <select class="form-control" name="mail_type" required="">
																		<option value="">--Select--</option>
																		<option value="smtp" <?php if ($data['type']=='smtp') {
                                                                            echo 'selected';
                                                                        } ?>>SMTP</option>
																		<option value="mail" <?php if ($data['type']=='mail') {
                                                                            echo 'selected';
                                                                        } ?>>Php Mail()</option>
																		</select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="port" class="col-sm-3 col-form-label font-weight-600">SMTP Port</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['port']; ?>" id="port" name="port">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="host" class="col-sm-3 col-form-label font-weight-600">SMTP Host</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="<?php echo $data['host']; ?>" id="host" name="host">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label font-weight-600">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="email" value="<?php echo $data['email']; ?>" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-3 col-form-label font-weight-600">Email Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password" value="<?php echo $data['password']; ?>" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-url-input" class="col-sm-3 col-form-label font-weight-600">Protocol</label>
                                            <div class="col-sm-9">
                                            <select class="form-control" name="protocol" required="">
																		<option value="">--Select--</option>
																		<option value="none" <?php if ($data['ssl_type']=='none') {
                                                                            echo 'selected';
                                                                        } ?>>None</option>
																		<option value="ssl" <?php if ($data['ssl_type']=='ssl') {
                                                                            echo 'selected';
                                                                        } ?>>SSL</option>
                                                                        <option value="tls" <?php if ($data['ssl_type']=='tls') {
                                                                            echo 'selected';
                                                                        } ?>>TLS</option>
																		</select>
                                        </div>
                                        
                                        
                                    </div>

                                    <p align="right">
                                    <button type="submit" name="submit" class="btn btn-labeled btn-danger mb-2 mr-1">
                                            <span class="btn-label"><i class="far fa-save"></i></span>Save SMTP Setting
                                        </button>
                                    </p>

                                    </form>
                        </div>
                    </div><!--/.body content-->
                    
                </div><!--/.main content-->
<?php include("footer.php"); ?>