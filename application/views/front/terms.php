<?php include("header.php"); ?>

<section id="" class="">
    <div class="container text-center">
        <h2 class="">
        Terms and Conditions
        </h2>
        <span class="section-divider"></span>
    </div>



    <div class="container">
    <?php 
            $a = GetPage('terms');
            $jsonobj= json_encode($a);
            $obj = json_decode ($jsonobj, true);
            $ax=$obj["terms"];
            echo htmlspecialchars_decode(stripslashes ($ax));
            ?>

    </div>
</section>



<?php include("footer.php"); ?>