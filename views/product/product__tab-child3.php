<div id="tab-child__section-comments__result">
    <p>
        امتیاز کاربران به:
        <span>گوشی سامسونگ مدل XYZ</span>
    </p>
    <?php
    $commentParam = $data[0];
    foreach ($commentParam as $param) {
        ?>
        <div class="row">
        <span class="row__title">
            <?= $param['title']?>
        </span>
            <ul>
                <li>
                    <span class="full"></span>
                </li>
                <li>
                    <span style="width: 20%"></span>
                </li>
                <li>
                </li>
                <li>
                </li>
                <li>
                </li>
            </ul>
        </div>
    <?php } ?>
<!--
    <div class="row">
        <span class="row__title">
            ارزش خریدبه نسبت قیمت
        </span>
        <ul>
            <li>
                <span class="full"></span>
            </li>
            <li>
                <span style="width: 20%"></span>
            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
        </ul>
    </div>
    <div class="row">
                        <span class="row__title">
                            نوآوری
                        </span>
        <ul>
            <li>
                <span class="full"></span>
            </li>
            <li>
                <span style="width: 60%"></span>
            </li>
            <li>
            </li>
            <li>
            </li>
            <li>
            </li>
        </ul>
    </div>
-->
</div>
<div id="tab-child__section-comments__new">
    <p>
        شما هم می توانید نظر خود را ارسال نمایید
    </p>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at consequuntur distinctio
        dolores eius error exercitationem impedit pariatur quo sapiente. A adipisci aut dolorum error
        ipsum perspiciatis praesentium ut vero?
    </p>
    <div class="email" style="width: 115px;float: left">
        <span class="btn yekan font-md" style="width: 115px">نظر خود را بنویسید</span>
    </div>
</div>
<div id="tab-child__section-comments">
    <p>
        نظرات کاربران
    </p>
    <div class="horizontal__line"></div>
    <?php
    $comment=$data[1];
    foreach ($comment as $row){
    ?>
        <div id="comment<?=$row['id']?>" class="comment">
            <div class="comment__header">
                <div class="comment__header-right">
                    <span class="name" style="">

                    </span>
                    <span class="date" style="">
                        <?= $row['date']; ?>
                    </span>
                </div>
                <div class="comment__header-left">
                    <span class="dislike" style="">
                        <i></i>
                        <span>
                            <?= $row['disliked']; ?>
                        </span>
                    </span>
                    <span class="like" style="">
                        <i></i>
                        <span>
                            <?= $row['liked']; ?>
                        </span>
                    </span>
                </div>
            </div>
            <div class="comment__content">
                <div class="comment__content-right"></div>
                <div class="comment__content-left"></div>
            </div>
        </div>
    <?php } ?>
<!--
    <div class="comment">
        <div class="comment__header">
            <div class="comment__header-right"></div>
            <div class="comment__header-left"></div>
        </div>
        <div class="comment__content">
            <div class="comment__content-right"></div>
            <div class="comment__content-left"></div>
        </div>
    </div>
    <div class="comment">
        <div class="comment__header">
            <div class="comment__header-right"></div>
            <div class="comment__header-left"></div>
        </div>
        <div class="comment__content">
            <div class="comment__content-right"></div>
            <div class="comment__content-left"></div>
        </div>
    </div>
-->
</div>
