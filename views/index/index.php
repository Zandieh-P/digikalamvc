<main>
    <div class="main__content">
        <div id="banner__top">
            <img src="public/images/banner.jpg" alt="banner">
        </div>
        <?php require('sidebar__right.php');?>
        <div id="content">
            <?php
            require('slider1.php');
            require('features.php');
            require('slider2.php');
            require('onlyInDigikala.php');
            require('directAccess.php');
            require('mostViewed.php');
            require('mostSaled.php');
            require('latestProducts.php');
            ?>
        </div>
    </div>
    <?php require ('lastSeen.php')?>
</main>
<script>
    function slider3(direction, tag) {
        let marginRightNew;
        let spanTag = $(tag)
        let slider3Scroll = spanTag.parents('.slider3');
        let slider3Ul = slider3Scroll.find('.slider3__items ul');
        let slider3Items = slider3Ul.find('li');
        let slider3ItemsNumber = slider3Items.length;
        let slider3ScrollNumber = Math.ceil(slider3ItemsNumber / 4);
        let MaxNegativeMargin = -(slider3ScrollNumber - 1) * 780;
        slider3Ul.css('width', slider3ItemsNumber * 195);
        let marginRightOld = slider3Ul.css('margin-right');
        marginRightOld = parseFloat(marginRightOld);
        if (direction === 'left') {
            marginRightNew = marginRightOld - 780;
        }
        if (direction === 'right') {
            marginRightNew = marginRightOld + 780;
        }
        if (marginRightNew < MaxNegativeMargin) {
            marginRightNew = 0;
        }
        if (marginRightNew > 0) {
            marginRightNew = MaxNegativeMargin;
        }
        slider3Ul.animate({'marginRight': marginRightNew}, 900);
    }

    $('.slider3__next-arrow').click(function () {
        slider3('left');
    })
    $('.slider3__previous-arrow').click(function () {
        slider3('right');
    })
    // slider3
</script>
