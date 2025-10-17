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
                                <li class="breadcrumb-item"><a href="#">Profile</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn  typcn-lock-closed-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">Change Password</h1>
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
                                        <h6 class="fs-17 font-weight-600 mb-0">Change Password</h6>
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
                            
                            <form action="<?php echo base_url('admin/change_password'); ?>" method="post">
                                        
                                        <div class="form-group row">
                                            <label for="existingPassword" class="col-sm-3 col-form-label font-weight-600">Old Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password" id="existingPassword" name="existingPassword">
                                                <?php echo "<span style='color:red'>".form_error('existingPassword')."</span>"; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="newPassword" class="col-sm-3 col-form-label font-weight-600">New Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password" id="newPassword" name="newPassword">
                                                <?php echo "<span style='color:red'>".form_error('newPassword')."</span>"; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirmPassword" class="col-sm-3 col-form-label font-weight-600">Confirm New Password</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="password" id="confirmPassword" name="confirmPassword">
                                                <?php echo "<span style='color:red'>".form_error('confirmPassword')."</span>"; ?>
                                            </div>
                                        </div>
                                        
                                        

                                    <p align="right">
                                    <button type="submit" name="submit" class="btn btn-labeled btn-danger mb-2 mr-1">
                                            <span class="btn-label"><i class="far fa-save"></i></span>Submit
                                        </button>
                                    </p>

                                    </form>
                        </div></div>
                    </div><!--/.body content-->
                    
                </div><!--/.main content-->
<?php include("footer.php"); ?>