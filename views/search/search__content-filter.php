<div id="search__content-filters__selected"></div>
<ul class="search__content-filter__top">
    <?php
    $attr=[];
    if (isset($data['attr'])){
        $attr = $data['attr'];
    }
    foreach($attr as $row){
    ?>
        <li class="yekan">
                    <span class="title">
                        <?= $row['title'];?>
                    </span>
            <i></i>
            <div class="search__content-filter__options">
                <ul>
                    <li class="yekan" data-filterId="0">
                        <span class="squares"></span>
                        نمایش همه
                    </li>
                    <div class="horizontal__line"></div>
                    <?php
                    $values=[];
                    if (isset($row['values'])){
                        $values = $row['values'];
                    }
                    foreach($values as $val){
                    ?>
                        <li class="yekan" data-idattr="<?= $row['id']?>" data-filterId="<?= $val['id']?>">
                            <span class="squares"></span>
                            <?= $val['val']?>
                        </li>
                    <?php }?>

                    <!--<li class="yekan" data-filterId="1">
                        <span class="squares"></span>
                        یک
                    </li>
                    <li class="yekan" data-filterId="2">
                        <span class="squares"></span>
                        دو
                    </li>
                    <li class="yekan" data-filterId="3">
                        <span class="squares"></span>
                        سه
                    </li>-->
                </ul>
            </div>
        </li>
    <?php } ?>

    <!--<li class="yekan">
                    <span class="title">
                        تعداد سیم کارت
                    </span>
        <i></i>
        <div class="search__content-filter__options">
            <ul>
                <li class="yekan" data-filterId="0">
                    <span class="squares"></span>
                    نمایش همه
                </li>
                <div class="horizontal__line"></div>
                <li class="yekan" data-filterId="1">
                    <span class="squares"></span>
                    یک
                </li>
                <li class="yekan" data-filterId="2">
                    <span class="squares"></span>
                    دو
                </li>
                <li class="yekan" data-filterId="3">
                    <span class="squares"></span>
                    سه
                </li>
            </ul>
        </div>
    </li>
    <li class="yekan">
                    <span class="title">
                        رزولوشن عکس
                    </span>
        <i></i>
        <div class="search__content-filter__options">
            <ul>
                <li class="yekan" data-filterId="4">
                    <span class="squares"></span>
                    نمایش همه
                </li>
                <div class="horizontal__line"></div>
                <li class="yekan" data-filterId="5">
                    <span class="squares"></span>
                    یک مگا پیکسل
                </li>
                <li class="yekan" data-filterId="6">
                    <span class="squares"></span>
                    دو مگا پیکسل
                </li>
                <li class="yekan" data-filterId="7">
                    <span class="squares"></span>
                    سه مگا پیکسل
                </li>
            </ul>
        </div>
    </li>
    <li class="yekan">
                    <span class="title">
                        حافظه داخلی
                    </span>
        <i></i>
        <div class="search__content-filter__options">
            <ul>
                <li class="yekan" data-filterId="8">
                    <span class="squares"></span>
                    نمایش همه
                </li>
                <div class="horizontal__line"></div>
                <li class="yekan" data-filterId="9">
                    <span class="squares"></span>
                    یک مگا پیکسل
                </li>
                <li class="yekan" data-filterId="10">
                    <span class="squares"></span>
                    دو مگا پیکسل
                </li>
                <li class="yekan" data-filterId="11">
                    <span class="squares"></span>
                    سه مگا پیکسل
                </li>
            </ul>
        </div>
    </li>
    <li class="yekan">
                    <span class="title">
                        شبکه های ارتباطی
                    </span>
        <i></i>
        <div class="search__content-filter__options">
            <ul>
                <li class="yekan" data-filterId="12">
                    <span class="squares"></span>
                    نمایش همه
                </li>
                <div class="horizontal__line"></div>
                <li class="yekan" data-filterId="13">
                    <span class="squares"></span>
                    یک
                </li>
                <li class="yekan" data-filterId="14">
                    <span class="squares"></span>
                    دو
                </li>
                <li class="yekan" data-filterId="15">
                    <span class="squares"></span>
                    سه
                </li>
            </ul>
        </div>
    </li>-->

</ul>
<div class="horizontal__line" style="float: right; width: 100%"></div>
<script>
    let searchItems = $('.search__content-filter__options li');
    let searchSelectedFilter = $('#search__content-filters__selected');
    let filters = $('.search__content-filter__top li');

    filters.hover(function () {
        $('.search__content-filter__options', this).slideDown(200);
    }, function () {
        $('.search__content-filter__options', this).slideUp(200);
    })
    searchItems.hover(function () {
        $('span', this).addClass('square__hover');
    }, function () {
        $('span', this).removeClass('square__hover');
    })

    searchItems.click(function () {
        let title = $(this).parents('li').find('.title').text();
        let value = $(this).text();
        let liFilterId = $(this).attr("data-filterId");
        let idAttr = $(this).attr("data-idattr");
        let spanFilter = searchSelectedFilter.find('span[data-spanFilterId=' + liFilterId + ']');
        if (spanFilter.length > 0) {
            spanFilter.remove();
        } else {
            let filterSpan = '<span class="search-filters__selected-span" data-spanFilterId="' + liFilterId + '">' + title + ':' + value + '<i class="remove__filter" onclick="removeFilter(this)"></i><input type="hidden" name="attr-'+idAttr+'[]" value="'+liFilterId+'"></span>';
            searchSelectedFilter.append(filterSpan);
        }
        $('span', this).toggleClass('square__selected');
        dosearch();
    })

    function removeFilter(tag) {
        let span_tag = $(tag).parents('span');
        let id = span_tag.attr('data-spanFilterId');
        $('.search__content-filter__options li[data-filterId=' + id + ']').find(".squares").removeClass('square__selected');
        span_tag.remove();
        dosearch();
    }

    /*
        $(document).on('event', 'selector',function (){})
        $(document).on('click', searchItems ,function (){$(this).parents('span').remove();})
        */
</script>