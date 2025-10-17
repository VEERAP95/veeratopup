<?php include("header.php"); ?>

<section id="" class="">
    <div class="container text-center">
        <h2 class="">
            Privacy Policy
        </h2>
        <span class="section-divider"></span>
    </div>



    <div class="container">
    <?php 
            $a = GetPage('privacy');
            $jsonobj= json_encode($a);
            $obj = json_decode ($jsonobj, true);
            $ax=$obj["privacy"];
            echo htmlspecialchars_decode(stripslashes ($ax));
            ?>

    </div>
</section>



<?php include("footer.php"); ?>