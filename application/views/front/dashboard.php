<?php include("header.php"); ?>

<form action="/home" method="get">    <section id="" class="section">
        <div class="container">
            <div class="text-center">
                <h2 class="">
                    Dashboard
                </h2>
                <span class="section-divider"></span>
            </div>

        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <h5 class="m-none text-green">Welcome</h5>
                    <h3 class="margin-top-0 margin-bottom-0">
                    <?php echo $this->session->userdata('name'); ?>                    </h3>
                    <small class="text-muted">
                        Email ID :  <?php echo $this->session->userdata('email'); ?>
                    </small>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12 text-right">
                    <div class="row ">
                        <div class="col-xs-12">
                            <a href="<?php echo base_url() ?>home" class="btn btn-theme btn-lg btn-block btn-curved btn-shadow">Recharge Now</a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row margin-top-15">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-usd"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Wallet Balance </span>
                            <label ID="lblTotalSent" Text="" class="info-box-number">$ <?php
if($this->session->userdata('login')) {
    $acid=$this->session->userdata('email');
    $this->load->helper('myfunction');
    $Balance = GetWallet($acid);
    $jsonobj= json_encode($Balance);
    $obj = json_decode ($jsonobj, true);
    $dmt_bal=$obj[0]["wallet"];
    echo $dmt_bal;
}else{
    echo '0.00';
}
?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 hidden">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Today's Data Topup</span>
                            <label ID="lblLastSent" Text="" class="info-box-number">0</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-bar-chart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Airtime Topup</span>
                            <label ID="lblTotalOrders" Text="" class="info-box-number">0</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 hidden">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-calendar"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Data Topup</span>
                            <label ID="lblMonthlyOrder" Text="" class="info-box-number">0</label>
                        </div>
                    </div>
                </div>
            </div>


                <div class="b-bottom mb-lg">
                    <h3>My Latest Recharge</h3>
                </div>
                <div id="tblAirtimeTransactions">


                </div>


                <div class="b-bottom mb-lg">
                    <h3>My Latest Wallet Transaction</h3>
                </div>
                <div id="tblAirtimeTransactions">


                </div>


        </div>
    </section>
</form>

<?php include("footer.php"); ?>