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
                <div class="text-center">
                    <h3 class="font-weight-bold mb-3">Congratulations!</h3>
                    <p class="text-muted">Form submitted successfully. Check your inbox to reset your password.</p>
                    <div class="row mb-5">
                        <div class="col-md-8 offset-md-2">
                            <img class="img-fluid" src="<?php echo base_url() ?>assets/dist/images/send_mail.svg"
                                 alt="send_mail">
                        </div>
                    </div>
                    <a href="<?php echo base_url() ?>admin">Turn Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery -->
<script src="<?php echo base_url() ?>assets/dist/vendor/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
<!-- Latform scripts -->
<script src="<?php echo base_url() ?>assets/dist/js/latform.min.js"></script>
</body>
</html>
