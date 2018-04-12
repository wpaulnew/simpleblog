<!-- Main Content -->
<div class="container login-form">
    <div class="row">
        <div class="col-md-12">

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
                    <p class="post-meta">on <?= $roll['time'] ?></p>
                    <span class="comment-count"><a href="/admin/comments/<?=$roll['id']?>"><i class="fa fa-comment-o" aria-hidden="true"></i></a> </span>

                    <a href="/admin/edit/<?=$roll['id']?>" class="instrument-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="/admin/remove/<?=$roll['id']?>" class="instrument-icon"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                <hr>

            <?php endforeach; ?>

            <!-- Pager -->
        </div>
    </div>
</div>

<script>
    $(".like").click(
        function (e) {
            e.preventDefault();
            var id = $(this).attr("href");
            var a = $(this);
            $.ajax({
                type: 'POST',
                url: '/all',
                data: {
                    'id': id
                },
                success: function (reply) {
                    var json = JSON.parse(reply);
                    $(a).html('<i class="fa fa-star" aria-hidden="true"></i> ' + json.likes);
                }
            });
        }
    );
</script>