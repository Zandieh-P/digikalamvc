<script src="public/js/jquery-ui.min.js"></script>
<script src="public/js/flatSlider.js"></script>
<link rel="stylesheet" href="public/style/jquery-ui.min.css">
<link rel="stylesheet" href="public/style/flatSlider.css">
<main>
    <div class="main__content" style="background: #fff; padding: 5px">
        <?php
        $params = [];
        $productInfo=[];
        $commentInfo=[];
        $comment_result=[];
        if (isset($data['params'])) {
            $params = $data['params'];
            $number = sizeof($params);
            $right = ceil($number / 2);
            $left = $number - $right;
            $params_right = array_slice($params, 0, $right);
            $params_left = array_slice($params, $right, $left);
        }
        if (isset($data['productInfo'])) {
            $productInfo = $data['productInfo'];
        }
        if (isset($data['commentInfo'])) {
            $commentInfo = $data['commentInfo'];
            $comment_result=unserialize($commentInfo['param']);
        } ?>
        <form action="addcomment/savecomment/<?= $productInfo['id'];?>" method="post">
            <div class="addComment">
                <div class="addComment__right">
                    <img class="img__fit__contain" src="public/images/products/25/product_800x800.jpg" alt="">
                </div>
                <div class="addComment__left">
                    <h4>امتیاز شما به این محصول</h4>
                    <div class="right">
                        <?php
                        foreach ($params_right as $row) {
                            ?>
                            <div class="row">
                                <p><?= $row['title']; ?></p>
                                <input data-val="<?=@$comment_result[$row['id']]; ?>" name="param<?=$row['id'] ?>" value="<?=@$comment_result[$row['id']]; ?>" type="hidden" id="slider_single" class="flat-slider"/>
                            </div>

                        <?php } ?>

                        <!--<div class="row">
                            <p>ارزش خرید به نسبت قیمت</p>
                            <input type="hidden" id="slider_single" class="flat-slider"/>
                        </div>
                        <div class="row">
                            <p>ارزش خرید به نسبت قیمت</p>
                            <input type="hidden" id="slider_single" class="flat-slider"/>
                        </div>
                        <div class="row">
                            <p>ارزش خرید به نسبت قیمت</p>
                            <input type="hidden" id="slider_single" class="flat-slider"/>
                        </div>-->
                    </div>
                    <div class="left">
                        <?php
                        foreach ($params_left as $row) {
                            ?>
                            <div class="row">
                                <p><?= $row['title']; ?></p>
                                <input data-val="<?=@$comment_result[$row['id']]; ?>" name="param<?=$row['id'] ?>" value="<?=@$comment_result[$row['id']]; ?>" type="hidden" id="slider_single" class="flat-slider"/>
                            </div>

                        <?php } ?>

                        <!--<div class="row">
                            <p>ارزش خرید به نسبت قیمت</p>
                            <input type="hidden" id="slider_single" class="flat-slider"/>
                        </div>
                        <div class="row">
                            <p>ارزش خرید به نسبت قیمت</p>
                            <input type="hidden" id="slider_single" class="flat-slider"/>
                        </div>
                        <div class="row">
                            <p>ارزش خرید به نسبت قیمت</p>
                            <input type="hidden" id="slider_single" class="flat-slider"/>
                        </div>-->
                    </div>
                </div>
                <div class="comment">
                    <h4>دیگران را با نوشتن نقد، بررسی و نظرات خود، برای انتخاب این محصول راهنمایی کنید.</h4>
                    <div class="row">
                        <input name="title" placeholder="عنوان نقد و بررسی" value="<?=$commentInfo['title'];?>">
                    </div>
                    <div class="row">
                        <input name="positive" placeholder="نقاط قوت" value="<?=$commentInfo['positive'];?>">
                    </div>
                    <div class="row">
                        <input name="negative" placeholder="نقاط ضعف" value="<?=$commentInfo['negative'];?>">
                    </div>
                    <div class="row">
                        <textarea name="comment"><?=$commentInfo['content'];?></textarea>
                    </div>
                    <div class="row">
                        <span class="basket__btn" onclick="submitForm()">ثبت نظر</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<script>

    function submitForm(){
        $('form').submit();
    }

    $(".flat-slider").flatslider({
        min: 1, max: 5,
        step: 1,
        value: 3,
        range: "min",
        disabled: false
    });

    /*$("#slider_single").flatslider({
        min: 1, max: 5,
        step: 1,
        value: 3,
        range: "min",
        einheit: '&euro;',
        disabled: true
    });*/
</script>