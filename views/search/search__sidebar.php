<div id="search__sidebar">
    <h3 class="yekan">
        گوشی موبایل
        <span class="search__subArrow"></span>
    </h3>
    <ul>
        <li class="title">
            کالای دیجیتال
            <ul>
                <li>
                    موبایل
                    <ul>
                        <li>
                            گوشی موبایل
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div class="horizontal__line"></div>
    <?php
    $filterRight = [];
    if (isset($data['attrRight'])) {
        $filterRight = $data['attrRight'];
    }
    foreach($filterRight as $attr){
        ?>
        <ul class="filter__ul">
            <li class="title"><?= $attr['title']?></li>
            <?php
            $attrValues=[];
            if (isset($attr['values'])) {
                $attrValues = $attr['values'];
            }
            foreach($attrValues as $val){
                ?>
                <li>
                    <span class="check__label"></span>
                    <input name="attr-<?= $attr['id']?>[]" value="<?= $val['id']?>" class="check__input" type="checkbox">
                    <?= $val['val']?>
                </li>
            <?php } ?>
        </ul>
        <div class="horizontal__line"></div>
    <?php } ?>

    <!--<ul class="filter__ul">
        <li class="title">بر اساس نوع</li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            سیستم عامل اندروید
        </li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            سیستم عامل ios
        </li>
    </ul>
    <div class="horizontal__line"></div>
    <ul class="filter__ul">
        <li class="title">بر اساس سازنده</li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            اپل
        </li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            سامسونگ
        </li>
    </ul>-->
    <div class="horizontal__line"></div>
    <ul class="filter__ul">
        <li class="title">بر اساس رنگ</li>
        <?php
        $colors=[];
        if (isset($data['colors'])) {
            $colors = $data['colors'];
        }
        foreach($colors as $color){
            ?>
            <li>
                <span class="check__label"></span>
                <input name="color[]" value="<?= $color['id']?>" class="check__input" type="checkbox">
                <span class="product__color" style="background-color: <?= $color['hex']?>"></span>
                <?= $color['title']?>
            </li>
        <?php } ?>
        <!--<li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            <span class="product__color" style="background-color: black"></span>
            مشکی
        </li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            <span class="product__color" style="background-color: red"></span>
            قرمز
        </li>-->
    </ul>

</div>
<script>
    $('#search__sidebar .check__input').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('li').find('.check__label').addClass('checked');
        } else {
            $(this).parents('li').find('.check__label').removeClass('checked');
        }
        dosearch();
    })
</script>