<?php include("header.php"); ?>
<link href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet">
<div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">User List</h1>
                                    <small>You Can Manage All Users From here One Click. <a href="<?php echo base_url() ?>" target="_blank"><?php echo base_url() ?></a></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.Content Header (Page header)--> 
                    <div class="body-content">
                        <!--Bootstrap 4 styling-->
                        
                        <!--Bootstrap 4 modal-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fs-17 font-weight-600 mb-0">All Users</h6>
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
                                <table class="table table-striped table-bordered nowrap bootstrap4-modal">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Wallet</th>
                                            <th>Registration Date</th>
                                            <!-- <th>Password</th> -->
                                            <!-- <th>Manage</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
            if (isset($data) && !empty($data)) {
                $scnt = 0;
                foreach ($data as $row) {
                    ?>
                                        <tr>
                                            <td><?php echo ++$scnt;?></td>
                                            
                                            <td><?php echo $row->name;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->mobile;?></td>
                                            <td><?php echo $row->wallet;?></td>
                                            <td><?php echo date("d M Y, g:i:s A", strtotime($row->rdate));?></td>
                                            <!-- <td><?php echo $row->password;?></td> -->
                                            <!-- <td>
                                                            
                                                            <a href="#" class="btn btn-danger-soft btn-sm"><i class="far fa-trash-alt"></i></a>
                                                        </td> -->

                                            
                                        </tr>
                                        <?php
                }
            } else {
                ?>
                
              
              
            </div>
            <?php } ?>
                                        
                                        
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--Bootstrap 4 Print button-->
                        
                    </div><!--/.body content-->
                </div><!--/.main content-->
<?php include("footer.php"); ?>
<!-- Third Party Scripts(used by this page)-->
<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/vfs_fonts.js"></script>
        <script src="a<?php echo base_url() ?>assets/adminssets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/datatables/data-bootstrap4.active.js"></script>