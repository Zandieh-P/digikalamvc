<?php
$technical = $data[0];
foreach ($technical as $attr_parent) {
    $children = $attr_parent['children'];
    ?>
    <h4>
        <?= $attr_parent['title'] ?>
    </h4>
    <?php
    foreach ($children as $child) {
        ?>
        <div class="tab-child__section-row">
            <div class="right">
                <?= $child['title'] ?>
            </div>
            <div class="left">
                <?php
                    if($child['value']==''){
                        echo '-';
                    }else{
                        echo $child['value'];
                    }
                ?>

            </div>
        </div>
    <?php } ?>
<?php } ?>

<!--
<h4>
    مشخصات فیزیکی
</h4>
<div class="tab-child__section-row">
    <div class="right">
        ابعاد
    </div>
    <div class="left">
        200 میلیمتر در 300 میلیمتر
    </div>
</div>
<div class="tab-child__section-row">
    <div class="right">
        وزن
    </div>
    <div class="left">
        280 گرم
    </div>
</div>

<h4>
    پردازنده
</h4>
<div class="tab-child__section-row">
    <div class="right">
        قدرت پردازش
    </div>
    <div class="left">
        10
    </div>
</div>
<div class="tab-child__section-row">
    <div class="right">
        سرعت پردازش
    </div>
    <div class="left">
        20
    </div>
</div>
-->