<main>
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
</main>