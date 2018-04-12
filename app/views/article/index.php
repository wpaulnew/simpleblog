<!-- Page Header -->
<header class="masthead" style="background-image: url('/public/img/upload/<?= $reveal['img'] ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= $reveal['title'] ?></h1>
                    <h2 class="subheading"><?= $reveal['description'] ?></h2>
                    <span class="meta"><?= $reveal['time'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <!--                <span class="comment-count"><i class="fa fa-comment-o" aria-hidden="true"></i> -->
                <? //= $reveal['comments'] ?><!--</span>-->
                <?= $reveal['text'] ?>
                <hr>
                <div class="comments col-md-12" id="comments">
                    <h3 class="mb-2" style="padding-bottom: 20px">Comments</h3>
                    <p class="active-comments">
                        <?php
                            if (empty($comments)) {
                                echo "Комментариев нет";
                            }
                        ?>
                    </p>
                    <div class="comments-list">
                        <!-- comment -->
                        <?php foreach ($comments as $comment) : ?>
                            <div class="comment mb-2 row">
<!--                                <div class="comment-avatar pr-1" style="width: 60px; height: 60px; margin-left: 15px">-->
<!--                                    <a href=""><img class="lazy mx-auto rounded-circle img-fluid"-->
<!--                                                    src="/public/img/lazy.gif"-->
<!--                                                    data-original="/public/img/uicon.png"-->
<!--                                                    alt="avatar"></a>-->
<!--                                </div>-->
                                <div class="comment-content col-md-11 col-sm-10" style="margin-top: 20px;">
                                    <h6 class="small comment-meta">
                                        <em><?= $comment['name'] ?></em> <?= $comment['time'] ?></h6>
                                    <div class="comment-body">
                                        <p><?= $comment['comment'] ?></p>
                                    </div>
                                    <?php if (isset($comment['answer'])) : ?>
                                        <div class="admin-answer" style="padding-bottom: 20px">
                                            <hr>
                                            <?= $comment['answer'] ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <h3 class="mb-2">Write comments</h3>
                    <!-- /comment -->
                    <div id="commentForm">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required
                                       data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" required
                                       data-validation-required-message="Please enter your name."
                                >
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required
                                          data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" id="sendMessageButton" style="width: 100%">Отправить
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</article>

<hr>

<script>
    $("img.lazy").lazyload();
</script>

<script>
    $("#sendMessageButton").click(
        function () {
            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();

            $.ajax({
                type: 'POST',
                data: {
                    'comment': {
                        'name': name,
                        'email': email,
                        'message': message
                    }
                },
                success: function (reply) {
//                    console.log(reply);
                    var json = JSON.parse(reply);
                    console.log(json);
                    $(".active-comments").css("display","none");
                    var comment = '<div class="comment mb-2 row"><div class="comment-content col-md-11 col-sm-10"><h6 class="small comment-meta"><a href="#">' + json.view.name + '</a> ' + json.view.time + '</h6><div class="comment-body"><p>' + json.view.comment + '</p></div></div></div>';
//                    var comment = '<div class="comment mb-2 row"><div class="comment-avatar col-md-1 col-sm-2 text-center pr-1"><a href=""><img class="mx-auto rounded-circle img-fluid"src="http://demos.themes.guide/bodeo/assets/images/users/w102.jpg"alt="avatar"></a></div><div class="comment-content col-md-11 col-sm-10"><h6 class="small comment-meta"><a href="#">' + json.view.name + '</a> ' + json.view.time + '</h6><div class="comment-body"><p>' + json.view.comment + '</p></div></div></div>';
                    $(".comments-list").append(comment);
                    $("#message").val('');
                    var comments = '<i class="fa fa-comment-o" aria-hidden="true"></i> ' + json.comments.comments;
                    $(".comment-count").html(comments);

                }
            });
        }
    );
</script>