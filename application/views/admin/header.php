<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin Dashboard</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/admin/dist/img/mini-logo.png">
        <!--Global Styles(used by all pages)-->
        <link href="<?php echo base_url() ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/typicons/src/typicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
        <!--Third party Styles(used by this page)--> 
        <link href="<?php echo base_url() ?>assets/admin/plugins/emojionearea/dist/emojionearea.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url() ?>assets/admin/dist/css/style.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body class="fixed">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav class="sidebar sidebar-bunker">
                <div class="sidebar-header">
                    <!--<a href="index.html" class="logo"><span>bd</span>task</a>-->
                    <a href="<?php echo base_url() ?>admin/dashboard" class="logo"><img src="<?php echo base_url() ?>assets/Content/img/Company-logo.png" width="200" alt=""></a>
                </div><!--/.sidebar header-->
                <div class="profile-element d-flex align-items-center flex-shrink-0">
                    <div class="avatar online">
                        <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar5.png" class="img-fluid rounded-circle" alt="">
                    </div>
                    <div class="profile-text">
                        <h6 class="m-0"><?php echo $this->session->userdata('name'); ?></h6>
                        <span><?php echo $this->session->userdata('email'); ?></span>
                    </div>
                </div><!--/.profile element-->
                <form class="search sidebar-form" action="#" method="get" >
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search...">
                        <i class="typcn typcn-zoom-outline search__helper" data-sa-action="search-close"></i>
                    </div>
                </form><!--/.search-->
                <div class="sidebar-body">
                    <nav class="sidebar-nav">
                        <ul class="metismenu">
                            <li class="nav-label">Main Menu</li>
                            <li class="mm-active">
                                <a href="<?php echo base_url() ?>admin/dashboard">
                                    <i class="typcn typcn-home-outline mr-2"></i>
                                    Dashboard
                                </a>
                                
                            </li>
                            <li>
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-cog-outline mr-2"></i>
                                    Console
                                </a>
                                <ul class="nav-second-level">
                                    <li><a href="<?php echo base_url() ?>admin/websetting">Web Setting</a></li>
                                    <li><a href="<?php echo base_url() ?>admin/slider">Slider Setting</a></li>
                                    <!-- <li><a href="<?php echo base_url() ?>admin/webpage">Page Setting</a></li> -->
                                    <li><a href="<?php echo base_url() ?>admin/api">API Setting</a> </li>
                                    <li><a href="<?php echo base_url() ?>admin/whatsapp">Whatsapp</a></li>
                                    <li><a href="<?php echo base_url() ?>admin/emailsetting">Email Setting</a></li>
                                    <!-- <li><a href="<?php echo base_url() ?>admin/pricing">Pricing</a></li> -->
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-mail mr-2"></i>
                                    Page Setting
                                </a>
                                <ul class="nav-second-level">
                                    <li><a href="<?php echo base_url() ?>admin/terms">Terms & Condition</a></li>
                                    <li><a href="<?php echo base_url() ?>admin/privacy">Privacy Policy</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="users"><i class="typcn typcn-group mr-2"></i> Users</a></li>
                            
                            
                            <li>
                                <a class="has-arrow material-ripple" href="#">
                                    <i class="typcn typcn-clipboard mr-2"></i>
                                    Reports
                                </a>
                                <ul class="nav-second-level">
                                    <li><a href="<?php echo base_url() ?>admin/reports">Recharge Reports</a></li>
                                    <li><a href="<?php echo base_url() ?>admin/transactions">Transactions Reports</a></li>
                                </ul>
                            </li>
                            <li class="nav-label">Components</li>
                            
                            
                            
                            
                            <li><a href="<?php echo base_url() ?>admin/calender"><i class="typcn typcn-calendar-outline mr-2"></i>Calendar</a></li>
                            <li class="nav-label">Extra</li>
                            
                            
                            
                            
                            
                            
                            <li><a href="<?php echo base_url() ?>admin/logout"><i class="typcn typcn-lock-closed-outline mr-2"></i>Logout</a></li>
                        </ul>
                    </nav>
                </div><!-- sidebar-body -->
            </nav>
            <!-- Page Content  -->
            <div class="content-wrapper">
                <div class="main-content">
                    <nav class="navbar-custom-menu navbar navbar-expand-lg m-0">
                        <div class="sidebar-toggle-icon" id="sidebarCollapse">
                            sidebar toggle<span></span>
                        </div><!--/.sidebar toggle icon-->
                        <div class="d-flex flex-grow-1">
                            <ul class="navbar-nav flex-row align-items-center ml-auto">
                                
                                
                                
                                <li class="nav-item dropdown user-menu">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                        <!--<img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.png" alt="">-->
                                        <i class="typcn typcn-user-add-outline"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" >
                                        <div class="dropdown-header d-sm-none">
                                            <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                                        </div>
                                        <div class="user-header">
                                            <div class="img-user">
                                                <img src="<?php echo base_url() ?>assets/admin/dist/img/avatar5.png" alt="">
                                            </div><!-- img-user -->
                                            <h6><?php echo $this->session->userdata('name'); ?></h6>
                                            <span><?php echo $this->session->userdata('email'); ?></span>
                                        </div><!-- user-header -->
                                        <a href="<?php echo base_url() ?>admin/profile" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                                        
                                        <!-- <a href="" class="dropdown-item"><i class="typcn typcn-arrow-shuffle"></i> Activity Logs</a> -->
                                        <a href="<?php echo base_url() ?>admin/changepassword" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Change Password</a>
                                        <a href="<?php echo base_url() ?>admin/logout" class="dropdown-item"><i class="typcn typcn-key-outline"></i> Sign Out</a>
                                    </div><!--/.dropdown-menu -->
                                </li>
                            </ul><!--/.navbar nav-->
                            <div class="nav-clock">
                                <div class="time">
                                    <span class="time-hours"></span>
                                    <span class="time-min"></span>
                                    <span class="time-sec"></span>
                                </div>
                            </div><!-- nav-clock -->
                        </div>
                    </nav><!--/.navbar-->