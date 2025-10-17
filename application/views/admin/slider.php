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
                                <li class="breadcrumb-item"><a href="#">Page</a></li>
                                <li class="breadcrumb-item active">Slider Setting</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">Slider Setting</h1>
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
                                        <h6 class="fs-17 font-weight-600 mb-0">Slider Setting</h6>
                                        
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
                            
                            <div class="form-stp">
						<div class="form-stp-group">
							
							<div align="center" class="form-stp-input">
							
							<form action="<?php echo base_url('admin/slider_save'); ?>" method="post" enctype="multipart/form-data" id="WebSetting">
								<?php if($data['s1']!=='') { ?>
									<img src="<?php echo base_url() ?>/uploads/<?php echo $data['s1'];?>" width="200" />
									<p>&nbsp;</p>
									<?php } ?>
									<input type="file" name="logo" id="logo" size="20" />
                                    <input type="hidden" name="s" value="s1">
									<div align="center" class="form-stp-btn">
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
							<p>&nbsp;</p>
						</div>
									</form>
									
									
								<form action="<?php echo base_url('admin/slider_save'); ?>" method="post" enctype="multipart/form-data" id="WebSetting">
								<?php if($data['s2']!=='') { ?>
									<img src="../uploads/<?php echo $data['s2'];?>" width="200" />
									<?php } ?>
									<input type="file" name="logo" id="logo" size="20" />
                                    <input type="hidden" name="s" value="s2">
									<p>&nbsp;</p>
									<div align="center" class="form-stp-btn">
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
							<p>&nbsp;</p>
						</div>
									</form>
															
								<form action="<?php echo base_url('admin/slider_save'); ?>" method="post" enctype="multipart/form-data" id="WebSetting">
								<?php if($data['s3']!=='') { ?>
									<img src="../uploads/<?php echo $data['s3'];?>" width="200" />
									<?php } ?>
									<input type="file" name="logo" id="logo" size="20" />
                                    <input type="hidden" name="s" value="s3">
									<p>&nbsp;</p>
									<div align="center" class="form-stp-btn">
							<input type="submit" name="submit" value="Submit" class="btn btn-success" />
							<p>&nbsp;</p>
						</div>
									</form>
									
																
								
								
							</div>
						</div>
					</div>
                        </div>
                    
                    </div>
                    </div><!--/.body content-->
                    
                </div><!--/.main content-->
<?php include("footer.php"); ?>