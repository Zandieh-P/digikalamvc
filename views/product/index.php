<main>
    <div class="main__content" style="clear: both; width: 1200px; font-family: Yekan,sans-serif;">
        <?php
        $productInfo=$data['productInfo'];
        if ($productInfo['special']==1){
            require ('product__offer.php');
        }
        require ('product__details.php');
        require ('product__introduction.php');
        require ('onlyInDigikala.php');
        require ('product__tab.php');
        ?>
    </div>
</main>
<?php require ('gallery.php');?>