<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/icons/material-design-icons/css/mdi.min.css" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/latform-style-1.min.css" type="text/css">
    
</head>
<body>
<div class="form-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="logo">
                    <img src="<?php echo base_url() ?>assets/Content/img/Company-logo.png" width="250" alt="logo">
                </div>
                <div class="my-5 text-center">
                    <h3 class="font-weight-bold mb-3">Sign In</h3>
                    <p class="text-muted">Sign in to Admin continue</p>
                </div>
                <?php
        if($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('error').'</div>';
        }
        ?>
            <form id="loginForm" action="<?php echo base_url('admin/index'); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="form-icon-wrapper">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" autofocus
                                   required>
                                   <?php echo "<span style='color:red'>".form_error('email')."</span>"; ?>
                            <i class="form-icon-left mdi mdi-email"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="form-icon-wrapper">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"
                                   required>
                                   <?php echo "<span style='color:red'>".form_error('password')."</span>"; ?>
                            <i class="form-icon-left mdi mdi-lock"></i>
                            <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                <i class="mdi mdi-eye"></i>
                            </a>
                        </div>
                    </div>
                    <div align="center" class="g-recaptcha" data-sitekey="6LeejYEUAAAAAOHP-Y6tgyyPvqPTyFZUAQUiBhYq"></div>
                    <div class="form-group">
                        <div class="d-md-flex justify-content-between">
                            <div class="custom-control custom-checkbox mb-2 mb-md-0">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                <label class="custom-control-label" for="customCheck1">Remember me</label>
                            </div>
                            <a href="<?php echo base_url() ?>admin/forgot">I forgot my password!</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" name="submit">Sign In</button>
                    </div>
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Jquery -->
<script src="<?php echo base_url() ?>assets/dist/vendor/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<!-- Latform scripts -->
<script src="<?php echo base_url() ?>assets/dist/js/latform.min.js"></script>
</body>
</html>
