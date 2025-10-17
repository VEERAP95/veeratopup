<?php include("header.php"); ?>
<link href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/admin/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet">
        
<div class="content-header row align-items-center m-0">
                        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
                            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active">Reports</li>
                            </ol>
                        </nav>
                        <div class="col-sm-8 header-title p-0">
                            <div class="media">
                                <div class="header-icon text-success mr-3"><i class="typcn typcn-puzzle-outline"></i></div>
                                <div class="media-body">
                                    <h1 class="font-weight-bold">Recharge Reports</h1>
                                    
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
                                        <h6 class="fs-17 font-weight-600 mb-0">Recharge Reports</h6>
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
                                            <th>Email</th>
                                            <th scope="col">Mobile No.</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Operator</th>
                                            <th scope="col">TXNID</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">API Log</th>
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
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->number;?></td>
      <td><?php echo $row->amount;?></td>
      <td><?php echo $row->operator;?></td>
      <td><?php echo $row->optid;?></td>
      <td style="color:<?php if ($row->status=='SUCCESS') {
        echo 'green';
      }elseif ($row->status=='FAILED') {
        echo 'red';
      }else{echo 'orange';}?>;" ><?php echo $row->status;?></td>
      <td><?php echo date("d M Y, g:i:s A", strtotime($row->rch_time));?></td>
      <td><?php echo $row->api_log;?></td>
    </tr>

                                            
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
                        <style>
            .modal-dialog {
	max-width: 1500px;
	margin: 1.75rem auto;
}
        </style>                 
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