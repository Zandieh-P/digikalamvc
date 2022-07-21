<link rel="stylesheet" href="<?= URL?>public/style/jquery.mCustomScrollbar.css">
<script src="<?= URL?>public/js/jquery.mCustomScrollbar.js"></script>
<script src="<?= URL?>public/js/jquery.elevatezoom.js"></script>

<div id="product__gallery-back"></div>
<div id="product__gallery">
    <h4>
        <?= $productInfo['title']; ?>
        <span class="close"></span>
    </h4>
    <div class="product__gallery-right">

        <?php
        $detailsGallery = $data['detailsGallery'];
        foreach ($detailsGallery as $row) {
            ?>
            <div class="product__gallery-rightItem">
                <img class="img__fit__contain"
                     src="public/images/products/<?= $row['idproduct'] ?>/gallery/small/<?= $row['img'] ?>" alt="">
            </div>
        <?php } ?>
        <!--
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(1).jpg" alt="">
                </div>
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(2).jpg" alt="">
                </div>
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(3).jpg" alt="">
                </div>
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(4).jpg" alt="">
                </div>
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(5).jpg" alt="">
                </div>
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(6).jpg" alt="">
                </div>
                <div class="product__gallery-rightItem">
                    <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(7).jpg" alt="">
                </div>
        -->
        <div class="product__gallery-rightItem">
            <img class="img__fit__contain gallery-right-main__image" src="<?= URL?>public/" alt="">
        </div>
    </div>
    <div class="product__gallery-left mCustomScrollbar">
        <ul>
            <?php
            $detailsGallery = $data['detailsGallery'];
            foreach ($detailsGallery as $row) {
                ?>
                <li data-main-image="public/images/products/<?= $row['idproduct'] ?>/gallery/large/<?= $row['img'] ?>">
                    <img class="img__fit__contain"
                         src="public/images/products/<?= $row['idproduct'] ?>/gallery/small/<?= $row['img'] ?>"
                         alt="">
                </li>
            <?php } ?>
            <!--
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(1).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(1).jpg"
                                 alt="">
                        </li>
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(2).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(2).jpg"
                                 alt="">
                        </li>
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(3).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(3).jpg"
                                 alt="">
                        </li>
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(4).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(4).jpg"
                                 alt="">
                        </li>
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(5).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(5).jpg"
                                 alt="">
                        </li>
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(6).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(6).jpg"
                                 alt="">
                        </li>
                        <li data-main-image="public/images/details-gallery/small/details-gallery2%20(7).jpg">
                            <img class="img__fit__contain" src="public/images/details-gallery/small/details-gallery2%20(7).jpg"
                                 alt="">
                        </li>
            -->
        </ul>
    </div>
</div>
<script>
    $('.mCustomScrollbar').mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        setTop: 0,
        setLeft: 0,
        axis: "y",
        scrollbarPosition: "inside",
        scrollInertia: 950,
        autoDraggerLength: true,
        autoHideScrollbar: false,
        autoExpandScrollbar: false,
        alwaysShowScrollbar: 0,
        snapAmount: null,
        snapOffset: 0,
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y",
            preventDefault: false,
            deltaFactor: "auto",
            normalizeDelta: false,
            invert: false,
            disableOver: ["select", "option", "keygen", "datalist", "textarea"]
        },
        scrollButtons: {
            enable: true,
            scrollAmount: "auto",
            scrollType: "stepless"
        },
        keyboard: {
            enable: true,
            scrollAmount: "auto",
            scrollType: "stepless"
        },
        contentTouchScroll: 25,
        advanced: {
            autoExpandHorizontalScroll: false,
            autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
            updateOnContentResize: true,
            updateOnImageLoad: true,
            updateOnSelectorChange: false,
            extraDraggableSelectors: false
        },
        theme: "3d-dark",
        callbacks: {
            onInit: false,
            onScrollStart: false,
            onScroll: false,
            whileScrolling: false,
            onTotalScroll: false,
            onTotalScrollBack: false,
            onTotalScrollOffset: 0,
            onTotalScrollBackOffset: 0,
            alwaysTriggerOffsets: true,
            onOverflowY: false,
            onOverflowX: false,
            onOverflowYNone: false,
            onOverflowXNone: false
        },
        live: false,
        liveSelector: null
    })

    let productGallery = $('#product__gallery');
    let productGalleryBack = $('#product__gallery-back');
    let productGalleryItems = productGallery.find('.product__gallery-rightItem');
    let productGalleryThumbnails = $('.product__gallery-left ul li');
    let mainImageUrl;
    let productGalleryImage = $('#details-gallery-img');
    let index;
    let max;

    productGalleryThumbnails.click(function () {
        productGalleryThumbnails.removeClass('active')
        $(this).addClass('active');
        productGalleryItems.fadeOut(0);
        mainImageUrl = $(this).attr("data-main-image");
        productGallery.find('.gallery-right-main__image').attr('src', mainImageUrl);
        productGallery.find('.gallery-right-main__image').parents('.product__gallery-rightItem').fadeIn(200);
    })

    /*    productGalleryThumbnails.click(function () {
            let index = $(this).index();
            showGallery(index);
        })*/

    function innerElevateZoom(selector) {
        $(selector).elevateZoom({
            'zoomWindowOffetx': -800,
            'scrollZoom': true,
            'easing': true,
            'easingDuration': 5000,
            'tint': true
        })
    }

    innerElevateZoom('#details-gallery-img');


    $('.details-gallery ul li').click(function () {
        index = $(this).index();
        mainImageUrl = $(this).attr("data-main-image");
        max = $(this).attr("data-last-index");
        if (index < max) {
            productGalleryImage.remove();
            $('.details-gallery-img').append('<img id="details-gallery-img" class="img__fit__contain" src=' + mainImageUrl + ' data-zoom-image=' + mainImageUrl + '>');
            productGalleryImage = $('#details-gallery-img');
            innerElevateZoom(productGalleryImage);
        } else {
            productGalleryThumbnails.removeClass('active');
            productGalleryThumbnails.eq(index).addClass('active');
            productGalleryItems.fadeOut(0);
            productGallery.find('.gallery-right-main__image').attr('src', mainImageUrl);
            productGallery.find('.gallery-right-main__image').parents('.product__gallery-rightItem').fadeIn(200);
            productGalleryBack.fadeIn(0);
            productGallery.fadeIn(200);
        }
    })

    // selector.unbind().function();

    function showGallery(index) {
        productGalleryThumbnails.removeClass('active')
        productGalleryThumbnails.eq(index).addClass('active');
        productGalleryItems.fadeOut(0);
        productGalleryItems.eq(index).fadeIn(200);
    }

    showGallery(0);

    productGallery.find('.close').click(function () {
        productGallery.fadeOut(0);
        productGalleryBack.fadeOut(0);
    })
</script>