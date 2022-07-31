<main>
    <form id="form_search" action="search/doSearch" method="post">
        <div class="main__content" style="clear: both; background: #fff; padding: 25px; width: 1150px">
            <?php
            require('search__sidebar.php');
            ?>
            <div id="search__content">
                <?php
                require('search__content-nav.php');
                require('search__content-filter.php');
                require('search__search.php');
                require('search__products.php');
                ?>
            </div>
        </div>
    </form>
</main>

<script>
    let current_page=1;
    dosearch();
    function dosearch(page) {
        let productsUl = $('#search__products ul');
        let paginationUl = $('#search__pagination ul');
        let last_li=$('#search__pagination ul li:last').text();
        let exist = 0;
        if ($('.onOff').hasClass('onOff__active')) {
            exist = 1;
        }
        let keyword = $('#keyword').val();
        if(typeof(page)== 'undefined'){
            current_page=1;
        }else {
            if(page<1){page=1;}
            if(page>last_li){page=last_li;}
            current_page=page;
        }
        /*if(current_page < 1){
            current_page=1;
        }
        if(current_page>last_li){
            current_page=last_li;
        }*/
        /*let current_page=$('#search__pagination ul li.active').text();
        if(current_page==''){current_page=1;}*/
        let pagination_limit=$('#pagination_limit option:selected').val();
        // let iterate_counter=1;
        let page_number=1;
        let start_page=current_page-1;
        // let start_page=current_page-2;
        let end_page=current_page+1;
        // let end_page=current_page+2;
        let item ='';
        let active='';
        let url = '<?=URL?>search/doSearch';
        let data = $('#form_search').serializeArray();
        data.push({'name': 'exist', 'value': exist});
        data.push({'name': 'keyword', 'value': keyword});
        data.push({'name': 'current_page', 'value': current_page});
        data.push({'name': 'pagination_limit', 'value': pagination_limit});
        //AJAX_$.post_Format: $(selector).post(URL,data,function (data,status,xhr){},dataType);
        $.post(url, data, function (msg) {
            // console.log(msg);
            productsUl.html('');
            $.each(msg[0], function (index, val) {
                item = '<li><a><div class="search__products-right"><div class="search__products-image"><img class="img__fit__contain" src="<?= URL?>public/images/products/' + val['id'] + '/product_800x800.jpg" alt=""></div><div class="search__products-colors"><span class="search__products-color" style="background: gold"></span><span class="search__products-color" style="background: silver"></span><span class="search__products-color" style="background: white"></span></div><div class="search__products-rank"><div class="rank__grayStar"><div class="rank__redStar"></div></div></div></div><div class="search__products-left"><div class="search__products-title yekan">' + val['title'] + '</div><div class="description yekan">توضیحات محصول<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eveniet nemo voluptate. Ab asperiores commodi harum id incidunt nemo quibusdam.</div><div class="search__products-price yekan"><p class="search__products-redPrice yekan">' + val['price'] + ' تومان </p><p class="search__products-greenPrice yekan">100.000 تومان</p><span class="search__products-priceBasket"></span></div></div></a></li>';
                productsUl.append(item);
            })
            page_number=msg[1];
            if (start_page<1){
                start_page=1;
            }
            if(end_page>page_number){
                end_page=page_number;
            }
            paginationUl.html('');
            for (iterate_counter=start_page;iterate_counter<=end_page;iterate_counter++){
                if(iterate_counter==current_page){active='active';}else {active='';}
                paginationUl.append('<li onclick="pagination(this,'+iterate_counter+')" class="'+active+'">'+iterate_counter+'</li>')
            }
            /*for (iterate_counter=1;iterate_counter<=page_number;iterate_counter++){
                if(iterate_counter==current_page){active='active';}else {active='';}
                paginationUl.append('<li onclick="pagination(this,'+iterate_counter+')" class="'+active+'">'+iterate_counter+'</li>')
            }*/
        }, 'json')
        /*$.post(url,data, function (msg) {
            console.log(msg);
        })*/

    }
</script>