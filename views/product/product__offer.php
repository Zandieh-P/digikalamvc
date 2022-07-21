<link rel="stylesheet" href="<?= URL?>public/style/flipTimer.css">
<script src="<?= URL?>public/js/jquery.flipTimer.js"></script>
<div id="product__offer">
    <div class="product__flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>
    <div class="product__offer__finished yekan">
        تمام شد!
    </div>
    <span class="product__offer__discount">
                <span class="offer__discount-right"  style=""  >
                    <span class="yekan number" style=""><?=$productInfo['price_discount']?></span>
                    <span class="yekan">تومان</span>
                </span>
                <span class="offer__discount-left">
                    <span class="yekan">تخفیف</span>
                </span>
            </span>
</div>
<script>
    $(document).ready(function () {
        $('.product__flipTimer').flipTimer({
            direction: 'down',
            // date: 'Mar 7, 2022 10:32:00',
            date:'<?=$productInfo['date_special']?>',
            callback: function () {
                $('#product__offer').css('opacity', 0.4);
                $('.product__offer__finished').fadeIn(200);
            }
        });
    });
</script>