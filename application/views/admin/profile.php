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
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-calendar-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">Profile</h1>
                                    <small>the most popular full-sized.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                        <div class="row">
                            <div class="col-sm-12 col-xl-8">
                                <div class="media d-flex m-1 ">
                                    <div class="align-left p-1">
                                        <a href="#" class="profile-image">
                                            <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar5.png" class="avatar avatar-xl rounded-circle img-border height-100" alt="Card image">
                                        </a>
                                    </div>
                                    <div class="media-body text-left ml-3 mt-1">
                                        <h3 class="font-large-1 white"><?php echo $data['name']; ?>
                                            <span class="font-medium-1 white">(Admin)</span>
                                        </h3>
                                        <p class="white">
                                            <i class="fas fa-map-marker-alt"></i> India, IN </p>
                                        
                                        <ul class="list-inline">
                                            <li class="list-inline-item pr-1 line-height-1">
                                                <a href="#" class="fs-26 ">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item pr-1 line-height-1">
                                                <a href="#" class="fs-26 ">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item line-height-1">
                                                <a href="#" class="fs-26 ">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600">Birthday</h6>
                                            </div>
                                            <div class="col-auto">
                                                <time class="fs-13 font-weight-600 text-muted" datetime="1988-10-24">10/24/88</time>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600">Joined</h6>
                                            </div>
                                            <div class="col-auto">
                                                <time class="fs-13 font-weight-600 text-muted" datetime="2023-08-28">28/07/23</time>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600">Location</h6>
                                            </div>
                                            <div class="col-auto">
                                                <span class="fs-13 font-weight-600 text-muted">INDIA</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="mb-0 font-weight-600">Website</h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="fs-13 font-weight-600"><?php echo $_SERVER['SERVER_NAME']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0">Work Progress</h6>
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
                                        <div class="row mb-3">
                                            <div class="col-9">
                                                <div class="progress-wrapper">
                                                    <span class="progress-label text-muted">Pendings Tasks</span>
                                                    <div class="progress mt-1 mb-2" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 align-self-end text-right">
                                                <span class="h6 mb-0">40%</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-9">
                                                <div class="progress-wrapper">
                                                    <span class="progress-label text-muted">Completed Tasks</span>
                                                    <div class="progress mt-1 mb-2" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 align-self-end text-right">
                                                <span class="h6 mb-0">67%</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-9">
                                                <div class="progress-wrapper">
                                                    <span class="progress-label text-muted">Tasks In Progress</span>
                                                    <div class="progress mt-1 mb-2" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 align-self-end text-right">
                                                <span class="h6 mb-0">89%</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-9">
                                                <div class="progress-wrapper">
                                                    <span class="progress-label text-muted">All Tasks</span>
                                                    <div class="progress mt-1 mb-2" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 align-self-end text-right">
                                                <span class="h6 mb-0">55%</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="progress-wrapper">
                                                    <span class="progress-label text-muted">Reports</span>
                                                    <div class="progress mt-1 mb-2" style="height: 5px;">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100" style="width: 99%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 align-self-end text-right">
                                                <span class="h6 mb-0">99%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0">Edit Profile</h6>
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
                                        <form>
                                            <div class="row">
                                                <div class="col-md-5 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">Company (disabled)</label>
                                                        <input type="text" class="form-control" disabled="" placeholder="Company" value="<?php echo $_SERVER['SERVER_NAME']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 px-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">Username</label>
                                                        <input type="text" class="form-control" placeholder="Name" value="<?php echo $data['name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">Email address</label>
                                                        <input type="email" class="form-control" placeholder="Email" value="<?php echo $data['email']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">Address</label>
                                                        <input type="text" class="form-control" placeholder="Home Address" value="<?php echo $data['address']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 pr-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">City</label>
                                                        <input type="text" class="form-control" placeholder="City" value="<?php echo $data['city']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 px-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">Country</label>
                                                        <input type="text" class="form-control" placeholder="Country" value="<?php echo $data['country']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pl-md-1">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">Postal Code</label>
                                                        <input type="number" class="form-control" placeholder="<?php echo $data['pincode']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="font-weight-600">About Me</label>
                                                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description"><?php echo $data['description']; ?>.</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-fill btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.body content-->
                </div><!--/.main content-->
<?php include("footer.php"); ?>