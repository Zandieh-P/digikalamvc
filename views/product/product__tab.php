<ul id="product__tab">
    <li class="yekan product__tab-naghd active">
        نقد و بررسی تخصصی
    </li>
    <li class="yekan product__tab-fanni">
        مشخصات فنی
    </li>
    <li class="yekan product__tab-nazarat">
        نظرات کاربران
    </li>
    <li class="yekan product__tab-porsesh">
        پرسش و پاسخ
    </li>
</ul>
<div id="product__tab-child">
    <section class="yekan"></section>
    <section class="yekan"></section>
    <section class="yekan"></section>
    <section id="questions" class="yekan"></section>
    <?php
//        require ('product__tab-child1.php');
//        require ('product__tab-child2.php');
//        require ('product__tab-child3.php');
//        require ('product__tab-child4.php');
    ?>
</div>

<script>
    $('#product__tab li').click(function () {
        changeTab($(this));
    })

    function changeTab(tag){
        let index = tag.index();
        let selector=$('#product__tab-child section');
        let url='<?= URL?>product/tab/<?= $productInfo['id']?>/<?= $productInfo['cat']?>';
        //let url='http://localhost/digikalamvc/product/tab/<?//= $productInfo['id']?>///<?//= $productInfo['cat']?>//';
        let data ={'number':index};
        $('#product__tab li').removeClass('active');
        tag.addClass('active');
        selector.fadeOut(0);
        let section_selected=selector.eq(index);
        //AJAX_$.post_Format: $(selector).post(URL,data,function (data,status,xhr){},dataType);
        $.post(url,data,function(msg){
            section_selected.html(msg);
        });
        section_selected.fadeIn(200);
    }

    $('.<?= $data['activeTab'];?>').trigger('click');

    /*$('#product__tab li').click(function () {
        let index = $(this).index();
        let selector=$('#product__tab-child section');
        let url='<?= URL?>product/tab/<?= $productInfo['id']?>/<?= $productInfo['cat']?>';
        //let url='http://localhost/digikalamvc/product/tab/<?//= $productInfo['id']?>///<?//= $productInfo['cat']?>//';
        let data ={'number':index};
        $('#product__tab li').removeClass('active');
        $(this).addClass('active');
        selector.fadeOut(0);
        let section_selected=selector.eq(index);
        //AJAX_$.post_Format: $(selector).post(URL,data,function (data,status,xhr){},dataType);
        $.post(url,data,function(msg){
            section_selected.html(msg);
        });
        section_selected.fadeIn(200);
    })*/

</script>