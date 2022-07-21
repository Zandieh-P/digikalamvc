<div class="tab-item__container">
    <?php
    $description = $data[0];
    foreach ($description as $row) {
        ?>
        <div class="tab-child__item">
            <h4>
                <i></i>
                <span>
                    <?= $row['title'] ?>
                </span>
            </h4>
            <div class="child__item-description">
                <p>
                    <?= $row['description'] ?>
                </p>
            </div>
        </div>
    <?php } ?>

    <!--
        <div class="tab-child__item">
            <h4>
                <i></i>
                <span>
                                    طراحی و ساخت
                                </span>
            </h4>
            <div class="child__item-description">
                <p>
                    توضیحات طراحی و ساخت
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequatur ducimus
                    explicabo fuga nemo odio omnis pariatur placeat voluptate! Beatae consequuntur debitis
                    doloremque excepturi fugiat natus reprehenderit sapiente voluptas! Blanditiis iste
                    necessitatibus nemo provident ullam ut vitae voluptatem? Adipisci amet animi at autem
                    cum dicta doloremque, dolorum eligendi esse illum laudantium nulla omnis, quia
                    repellendus sequi similique tempora! Corporis, cumque, quibusdam. Amet aperiam autem,
                    corporis dolorem, explicabo id inventore laborum minus, molestiae neque nostrum
                    perferendis quas quisquam quo ratione repellat sapiente ullam. Accusantium ad, adipisci
                    aliquam architecto, dolor expedita laborum, laudantium minima nam nisi possimus
                    provident quam tempore ut voluptate! Dolorem doloribus labore laudantium maiores nobis
                    numquam provident, quidem. At ea est et illum magnam nihil perferendis praesentium quam
                    quo sequi sint, voluptates! Amet atque aut, autem corporis cupiditate debitis doloremque
                    dolores eaque eligendi est facilis harum ipsam iusto minus molestias nesciunt non
                    numquam quasi qui quibusdam quidem recusandae repellendus, repudiandae rerum sunt.
                    Animi, autem deleniti dolore dolorem ea, earum eius eligendi error excepturi facere in
                    iste minus necessitatibus non placeat quibusdam similique soluta sunt tempora veritatis
                    voluptas voluptatem voluptatibus. Alias architecto at atque aut distinctio dolorem
                    doloremque earum et eveniet id incidunt ipsa iure modi, nisi, nulla provident quos
                    reiciendis similique sint voluptatibus. Ab accusantium alias blanditiis culpa debitis
                    dolor dolore, dolorum ea eaque enim esse eveniet excepturi exercitationem facilis fugit
                    ipsa ipsum labore laborum maxime molestias odio odit optio perspiciatis, possimus,
                    praesentium quaerat quidem reiciendis sint sunt suscipit tempore ullam voluptas
                    voluptate! Corporis dolore enim ex ipsa laboriosam laudantium nihil nulla optio?
                    Accusamus, impedit porro quidem quod soluta veritatis voluptatum? Beatae commodi
                    inventore placeat. A architecto, dicta dolore doloremque eaque fugiat ipsam, molestiae
                    nihil, quisquam quod unde velit voluptatem. Aliquam amet asperiores, commodi culpa
                    cumque cupiditate deserunt doloribus enim facilis hic inventore ipsum laborum libero
                    magnam minus molestiae nesciunt obcaecati officia omnis optio possimus provident quas
                    quidem quo repellat reprehenderit sapiente tenetur vel vero voluptates? Amet laborum
                    nemo perferendis tempore! Ducimus enim error ipsa, perferendis placeat quos recusandae
                    velit. Cupiditate deserunt fugit id iure, maxime numquam repellendus soluta tempore
                    voluptatem? Accusantium adipisci, aut culpa distinctio eum inventore labore nisi
                    perspiciatis, placeat quam quia quos sint voluptatibus. A aliquid autem blanditiis,
                    commodi consequuntur culpa doloremque et excepturi expedita harum laudantium nesciunt
                    odio vero. Ad architecto corporis dicta doloribus eaque, ex excepturi exercitationem, id
                    illo iure nemo nihil nobis non, perspiciatis praesentium qui voluptatum? Consequatur
                    dolore exercitationem expedita ipsum libero magni reiciendis repellat repellendus
                    suscipit ullam? Asperiores atque beatae commodi cumque dolore dolorum earum et
                    exercitationem expedita fugiat impedit in incidunt iste itaque maxime, minima neque
                    nostrum nulla numquam officia omnis perspiciatis quae quibusdam reiciendis reprehenderit
                    repudiandae saepe sapiente soluta, totam ullam velit vero, voluptate voluptatibus. A ab
                    ad adipisci amet at dignissimos eius itaque laborum magnam nobis placeat saepe sed sequi
                    tempore totam vero, voluptas! Iste libero maxime natus, qui quidem similique? Ad aut
                    blanditiis cupiditate eius eum exercitationem fuga laborum nam nobis officia officiis
                    perferendis placeat possimus praesentium, quasi quia quidem repellat rerum sapiente
                    sequi tenetur, ullam vel.
                </p>
            </div>
        </div>
        <div class="tab-child__item">
            <h4>
                <i></i>
                <span>
                                    صفحه نمایش
                                </span>
            </h4>
            <div class="child__item-description">
                <p>
                    توضیحات صفحه نمایش
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequatur ducimus
                    explicabo fuga nemo odio omnis pariatur placeat voluptate! Beatae consequuntur debitis
                    doloremque excepturi fugiat natus reprehenderit sapiente voluptas! Blanditiis iste
                    necessitatibus nemo provident ullam ut vitae voluptatem? Adipisci amet animi at autem
                    cum dicta doloremque, dolorum eligendi esse illum laudantium nulla omnis, quia
                    repellendus sequi similique tempora! Corporis, cumque, quibusdam. Amet aperiam autem,
                    corporis dolorem, explicabo id inventore laborum minus, molestiae neque nostrum
                    perferendis quas quisquam quo ratione repellat sapiente ullam. Accusantium ad, adipisci
                    aliquam architecto, dolor expedita laborum, laudantium minima nam nisi possimus
                    provident quam tempore ut voluptate! Dolorem doloribus labore laudantium maiores nobis
                    numquam provident, quidem. At ea est et illum magnam nihil perferendis praesentium quam
                    quo sequi sint, voluptates! Amet atque aut, autem corporis cupiditate debitis doloremque
                    dolores eaque eligendi est facilis harum ipsam iusto minus molestias nesciunt non
                    numquam quasi qui quibusdam quidem recusandae repellendus, repudiandae rerum sunt.
                    Animi, autem deleniti dolore dolorem ea, earum eius eligendi error excepturi facere in
                    iste minus necessitatibus non placeat quibusdam similique soluta sunt tempora veritatis
                    voluptas voluptatem voluptatibus. Alias architecto at atque aut distinctio dolorem
                    doloremque earum et eveniet id incidunt ipsa iure modi, nisi, nulla provident quos
                    reiciendis similique sint voluptatibus. Ab accusantium alias blanditiis culpa debitis
                    dolor dolore, dolorum ea eaque enim esse eveniet excepturi exercitationem facilis fugit
                    ipsa ipsum labore laborum maxime molestias odio odit optio perspiciatis, possimus,
                    praesentium quaerat quidem reiciendis sint sunt suscipit tempore ullam voluptas
                    voluptate! Corporis dolore enim ex ipsa laboriosam laudantium nihil nulla optio?
                    Accusamus, impedit porro quidem quod soluta veritatis voluptatum? Beatae commodi
                    inventore placeat. A architecto, dicta dolore doloremque eaque fugiat ipsam, molestiae
                    nihil, quisquam quod unde velit voluptatem. Aliquam amet asperiores, commodi culpa
                    cumque cupiditate deserunt doloribus enim facilis hic inventore ipsum laborum libero
                    magnam minus molestiae nesciunt obcaecati officia omnis optio possimus provident quas
                    quidem quo repellat reprehenderit sapiente tenetur vel vero voluptates? Amet laborum
                    nemo perferendis tempore! Ducimus enim error ipsa, perferendis placeat quos recusandae
                    velit. Cupiditate deserunt fugit id iure, maxime numquam repellendus soluta tempore
                    voluptatem? Accusantium adipisci, aut culpa distinctio eum inventore labore nisi
                    perspiciatis, placeat quam quia quos sint voluptatibus. A aliquid autem blanditiis,
                    commodi consequuntur culpa doloremque et excepturi expedita harum laudantium nesciunt
                    odio vero. Ad architecto corporis dicta doloribus eaque, ex excepturi exercitationem, id
                    illo iure nemo nihil nobis non, perspiciatis praesentium qui voluptatum? Consequatur
                    dolore exercitationem expedita ipsum libero magni reiciendis repellat repellendus
                    suscipit ullam? Asperiores atque beatae commodi cumque dolore dolorum earum et
                    exercitationem expedita fugiat impedit in incidunt iste itaque maxime, minima neque
                    nostrum nulla numquam officia omnis perspiciatis quae quibusdam reiciendis reprehenderit
                    repudiandae saepe sapiente soluta, totam ullam velit vero, voluptate voluptatibus. A ab
                    ad adipisci amet at dignissimos eius itaque laborum magnam nobis placeat saepe sed sequi
                    tempore totam vero, voluptas! Iste libero maxime natus, qui quidem similique? Ad aut
                    blanditiis cupiditate eius eum exercitationem fuga laborum nam nobis officia officiis
                    perferendis placeat possimus praesentium, quasi quia quidem repellat rerum sapiente
                    sequi tenetur, ullam vel.
                </p>
            </div>
        </div>
        <div class="tab-child__item">
            <h4>
                <i></i>
                <span>
                                    سخت افزار و باتری
                                </span>
            </h4>
            <div class="child__item-description">
                <p>
                    توضیحات سخت افزار و باتری
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequatur ducimus
                    explicabo fuga nemo odio omnis pariatur placeat voluptate! Beatae consequuntur debitis
                    doloremque excepturi fugiat natus reprehenderit sapiente voluptas! Blanditiis iste
                    necessitatibus nemo provident ullam ut vitae voluptatem? Adipisci amet animi at autem
                    cum dicta doloremque, dolorum eligendi esse illum laudantium nulla omnis, quia
                    repellendus sequi similique tempora! Corporis, cumque, quibusdam. Amet aperiam autem,
                    corporis dolorem, explicabo id inventore laborum minus, molestiae neque nostrum
                    perferendis quas quisquam quo ratione repellat sapiente ullam. Accusantium ad, adipisci
                    aliquam architecto, dolor expedita laborum, laudantium minima nam nisi possimus
                    provident quam tempore ut voluptate! Dolorem doloribus labore laudantium maiores nobis
                    numquam provident, quidem. At ea est et illum magnam nihil perferendis praesentium quam
                    quo sequi sint, voluptates! Amet atque aut, autem corporis cupiditate debitis doloremque
                    dolores eaque eligendi est facilis harum ipsam iusto minus molestias nesciunt non
                    numquam quasi qui quibusdam quidem recusandae repellendus, repudiandae rerum sunt.
                    Animi, autem deleniti dolore dolorem ea, earum eius eligendi error excepturi facere in
                    iste minus necessitatibus non placeat quibusdam similique soluta sunt tempora veritatis
                    voluptas voluptatem voluptatibus. Alias architecto at atque aut distinctio dolorem
                    doloremque earum et eveniet id incidunt ipsa iure modi, nisi, nulla provident quos
                    reiciendis similique sint voluptatibus. Ab accusantium alias blanditiis culpa debitis
                    dolor dolore, dolorum ea eaque enim esse eveniet excepturi exercitationem facilis fugit
                    ipsa ipsum labore laborum maxime molestias odio odit optio perspiciatis, possimus,
                    praesentium quaerat quidem reiciendis sint sunt suscipit tempore ullam voluptas
                    voluptate! Corporis dolore enim ex ipsa laboriosam laudantium nihil nulla optio?
                    Accusamus, impedit porro quidem quod soluta veritatis voluptatum? Beatae commodi
                    inventore placeat. A architecto, dicta dolore doloremque eaque fugiat ipsam, molestiae
                    nihil, quisquam quod unde velit voluptatem. Aliquam amet asperiores, commodi culpa
                    cumque cupiditate deserunt doloribus enim facilis hic inventore ipsum laborum libero
                    magnam minus molestiae nesciunt obcaecati officia omnis optio possimus provident quas
                    quidem quo repellat reprehenderit sapiente tenetur vel vero voluptates? Amet laborum
                    nemo perferendis tempore! Ducimus enim error ipsa, perferendis placeat quos recusandae
                    velit. Cupiditate deserunt fugit id iure, maxime numquam repellendus soluta tempore
                    voluptatem? Accusantium adipisci, aut culpa distinctio eum inventore labore nisi
                    perspiciatis, placeat quam quia quos sint voluptatibus. A aliquid autem blanditiis,
                    commodi consequuntur culpa doloremque et excepturi expedita harum laudantium nesciunt
                    odio vero. Ad architecto corporis dicta doloribus eaque, ex excepturi exercitationem, id
                    illo iure nemo nihil nobis non, perspiciatis praesentium qui voluptatum? Consequatur
                    dolore exercitationem expedita ipsum libero magni reiciendis repellat repellendus
                    suscipit ullam? Asperiores atque beatae commodi cumque dolore dolorum earum et
                    exercitationem expedita fugiat impedit in incidunt iste itaque maxime, minima neque
                    nostrum nulla numquam officia omnis perspiciatis quae quibusdam reiciendis reprehenderit
                    repudiandae saepe sapiente soluta, totam ullam velit vero, voluptate voluptatibus. A ab
                    ad adipisci amet at dignissimos eius itaque laborum magnam nobis placeat saepe sed sequi
                    tempore totam vero, voluptas! Iste libero maxime natus, qui quidem similique? Ad aut
                    blanditiis cupiditate eius eum exercitationem fuga laborum nam nobis officia officiis
                    perferendis placeat possimus praesentium, quasi quia quidem repellat rerum sapiente
                    sequi tenetur, ullam vel.
                </p>
            </div>
        </div>
    -->

</div>

<script>
    $('#product__tab-child h4').click(function () {
        const item = $(this).parents('.tab-child__item');
        $('.child__item-description', item).slideToggle(200);
        $(this).toggleClass('active')
    })
</script>