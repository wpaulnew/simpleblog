<header class="masthead" style="background-image: url('/public/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Живой блог</h1>
                    <span class="subheading">Блог о всяких интересностях</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <div id="list-of-articles">
                <?php foreach ($rolls as $roll) : ?>

                    <div class="post-preview">
                        <a href="/<?= $roll['id'] ?>">
                            <h2 class="post-title">
                                <?= $roll['title'] ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?= $roll['description'] ?>
                            </h3>
                        </a>
                        <p class="post-meta"><?= $roll['time'] ?></p>
<!--                        <span class="comment-count"><i class="fa fa-comment-o" aria-hidden="true"></i> --><?//= $roll['comments'] ?><!--</span>-->
                    </div>
                    <hr>

                <?php endforeach; ?>
            </div>

            <!-- Pager -->
            <div class="clearfix">
                <!--                <button class="btn btn-primary" href="#" id="show_more">Load more</button>-->
                <input class="btn btn-primary" id="show_more" count_show="3" count_add="2" type="button"
                       value="Показать еще" style="width: 100%"/>
            </div>
        </div>
    </div>
</div>

<hr>

<script>
    $(document).ready(function () {

        $('#show_more').click(function () {
            var btn_more = $(this);
            var count_show = parseInt($(this).attr('count_show'));
            var count_add = $(this).attr('count_add');
            btn_more.val('Подождите...');

            $.ajax({
                type: "POST", // метод передачи
                data: { // что отправляем
                    'more': {
                        "count_show": count_show,
                        "count_add": count_add
                    }
                },
                // после получения ответа сервера
                success: function (reply) {
                    console.log(reply);
                    var json = JSON.parse(reply);
                    if (json.correct) {
                        $('#list-of-articles').append(json.html);
                        btn_more.val('Показать еще');
                        btn_more.attr('count_show', (count_show + 2));
                    }

                    if (!json.correct) {
                        btn_more.val('Больше нечего показывать');
                    }

                }
            });
        });

    });
</script>