<?php include("header.php"); ?>
                    
                    <div class="body-content">
                    <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                    <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Today Sale</p>
                                        <h3 class="card-title fs-18 font-weight-bold">USD <?php
if($this->session->userdata('email')) {
    $email=$this->session->userdata('email');
    $this->load->helper('myfunction');
    $a = SaleCount(1);
    $jsonobj= json_encode($a);
    $obj = json_decode ($jsonobj, true);
    $ax=$obj[0]["total"];
    echo number_format($ax, 2);
}else{
    echo '0';
}
?>
                                        </h3>
                                    </div>
                                    <div class="card-footer p-3">
                                    <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i>Last 24 Hours
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                    <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Revenue</p>
                                        <h3 class="card-title fs-21 font-weight-bold">USD <?php
if($this->session->userdata('email')) {
    $email=$this->session->userdata('email');
    $this->load->helper('myfunction');
    $a = SaleCount(30);
    $jsonobj= json_encode($a);
    $obj = json_decode ($jsonobj, true);
    $ax=$obj[0]["total"];
    echo number_format($ax, 2);
}else{
    echo '0';
}
?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i>Last 30 Days
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Revenue</p>
                                        <h3 class="card-title fs-21 font-weight-bold">USD <?php
if($this->session->userdata('email')) {
    $email=$this->session->userdata('email');
    $this->load->helper('myfunction');
    $a = SaleCount(365);
    $jsonobj= json_encode($a);
    $obj = json_decode ($jsonobj, true);
    $ax=$obj[0]["total"];
    echo number_format($ax, 2);
}else{
    echo '0';
}
?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                    <div class="stats">
                                            <i class="typcn typcn-calendar-outline mr-2"></i>Last 1 Year
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Revenue</p>
                                        <h3 class="card-title fs-21 font-weight-bold">USD <?php echo number_format($data['amount'], 2); ?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <i class="typcn typcn-upload mr-2"></i>Last STRIPE Transactions
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header bg-white pb-4">
                            <!-- Body -->
                            <div class="header-body mb-4">
                                <div class="row align-items-end">
                                    
                                    
                                </div> <!-- / .row -->
                            </div> <!-- / .header-body -->
                            <!-- Footer -->
                            <div class="header-footer">
                                <div class="chart">
                                    <canvas id="forecast" width="300" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                       
                        
                        
                        </div>
                    </div>
                <?php include("footer.php"); ?> 
                <?php include("charts.php"); ?>                