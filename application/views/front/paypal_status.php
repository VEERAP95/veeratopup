<?php include("header.php"); ?>
<section id="" class="section">
        <div class="container text-center">

            <h2 class="">
                Status
            </h2>
            <span class="section-divider"></span>
        </div>

    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2 col-xs-12">
                <div id="divSuccess" class="text-center">

                    <div id="pnlSuccessIcon">
                    <?php if($this->session->flashdata('success')){ ?>

<i class="fa fa-exclamation-circle fa-4x text-green"></i>
                <p class="text-center">
                    <span class="text-green"><?php echo $this->session->flashdata('success'); ?></span>
                </p> 

<?php } ?>
<?php if($this->session->flashdata('failure')){ ?>
                
                <i class="fa fa-exclamation-circle fa-4x text-red"></i>
                                <p class="text-center">
                                    <span class="text-red"><?php echo $this->session->flashdata('failure'); ?></span>
                                </p> 
        
        <?php } ?>                       

                    </div>
                    <a href="/"  class="btn btn-theme btn-lg btn-curved btn-shadow">Home</a>
                   

                </div>

            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>