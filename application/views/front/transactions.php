<?php include("header.php"); ?>

<script nonce="scrptTRX1">
        $(document).ready(function () {
            debugger;
        

        if ('' != null) {
            $('#Lblmsg').text('');
            var Status = '';
            if (Status == 'Success')
                $('#Lblmsg').css('color', 'green');
           else
                $('#Lblmsg').css('color', 'red');
        }

    })
</script>

<section id="" class="section">
    <div class="container text-center">

        <h2 class="">
            Transactions Reports
        </h2>
        <span class="section-divider"></span>
    </div>
<form action="transactions" method="post"><div class="container">

    <div class="row">

        <div class="col-sm-12">
            <div class="b-bottom mb-lg">
                <h3>Search By</h3>
            </div>
        </div>
            <div class="col-sm-3 col-xs-12">
                Type
                <div class="select-box-arrow">
                <select name="ddlstatus" value="All" class=" form-control select-box-arrow-lg" id="ddlstatus">
                    <option value="All" selected="selected">All</option>
                    <option value="Add Wallet">Wallet</option>
                    <option value="Recharge">Recharge</option>
                </select>
                    </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                From
                <input type="text" id="txtfromdate" name="fromdate" class="form-control" placeholder="mm/dd/yyyy" />
            </div>
            <div class="col-sm-3 col-xs-6">
                To
                <input type="text" id="txttodate" name="todate" class="form-control" placeholder="mm/dd/yyyy" />

            </div>
            <div class="col-sm-3 col-xs-12">
                Status
                <div class="select-box-arrow">
                <select name="ddlstatus" value="All" class=" form-control select-box-arrow-lg" id="ddlstatus">
                    <option value="All" selected="selected">All</option>
                    <option value="SUCCESS">Success</option>
                    <option value="FAILED">Failed</option>
                    <option value="PENDING">Pending</option>
                </select>
                    </div>
            </div>

            


            <div class="col-sm-12 col-xs-12 text-center margin-top-15">
                <input type="submit" id="btnsearch" name="btnsearch" class="btn btn-theme btn-curved" placeholder="To" value="Search">
                <input type="submit" id="showall" name="showall" class="btn btn-danger btn-curved" placeholder="To" value="Reset">
                <span id="lblerrordatemsg" style="color:red;"></span>

            </div>
        </div>
        <span id="Lblmsg"></span>
        
                
            <div id="tblAirtimeTransactions">
                
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">TxnId</th>
      <th scope="col">Date</th>
      <th scope="col">Type</th>
      <th scope="col">Credit Amount</th>
      <th scope="col">Debit Amount</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
            if (isset($data) && !empty($data)) {
                $scnt = 0;
                foreach ($data as $row) {
                    ?>
    <tr>
      <th scope="row"><?php echo ++$scnt;?></th>
      <td><?php echo $row->txnid;?></td>
      <td><?php echo date("d M Y, g:i:s A", strtotime($row->tdate));?></td>
      <td><?php echo $row->type;?></td>
      <td style="color:green"><?php echo $row->credit_amount;?></td>
      <td style="color:red"><?php echo $row->debit_amount;?></td>
      <td style="color:<?php if ($row->status=='SUCCESS') {
        echo 'green';
      }elseif ($row->status=='FAILED') {
        echo 'red';
      }else{echo 'orange';}?>;" ><?php echo $row->status;?></td>
    </tr>
    <?php
                }
            } else {
                ?>
                No data<?php } ?>
    
  </tbody>
</table>
            </div>

        
    </div>
</form>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script nonce="swiftreload" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script nonce="swiftreload" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script nonce="swiftreload" src="<?php echo base_url() ?>assets/Scripts/jquery-1.11.1.min.js"></script>

    
    <script nonce="scrptTRX2">
    var ststus = "All";
    var fromdate = "";
    var todate = "";
    var refno = ""; //lblerrordatemsg
    var datestatus = ""; //lblerrordatemsg

    $("#ddlstatus").val(ststus);
    $("#fromdate").val(fromdate);
    $("#todate").val(todate);
    $("#txtsearch").val(refno);
    $("#lblerrordatemsg").text(datestatus);

        $(document).ready(function () {
            
            $("#txtfromdate").datepicker({
                changeMonth: true,
                changeYear: true
            });
             
            $("#txttodate").datepicker({
                changeMonth: true,
                changeYear: true
            });
        

            $('#TransactionHistory tr').each(function () {
                var status = $(this).find(".status").html();
            });

            $('.grid-row').click(function () {
                var ReferenceNumber = $(this).find('.ReferenceNumber').text();

                window.location = "transaction-details?ReferenceNumber=" + ReferenceNumber;
            });


        });
    </script>


    

</section>

<?php include("footer.php"); ?>