<!-- Post Content -->
<article>
    <div class="container">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-lg-8 col-md-10 mx-aut" style="padding-top: 90px">

                <div class="comments col-md-12" id="comments">
                    <h3 class="mb-2">Comments</h3>

                    <div class="comments-list">
                        <!-- comment -->
                        <?php foreach ($comments as $comment) : ?>
                            <div class="comment mb-2 row" style="padding-top: 50px">
                                <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                                    <a href=""><img class="mx-auto rounded-circle img-fluid"
                                                    src="/public/img/uicon.png"
                                                    alt="avatar"></a>
                                </div>
                                <div class="comment-content col-md-11 col-sm-10">
                                    <h6 class="small comment-meta">
                                        <em><?= $comment['name'] ?></em> <?= $comment['time'] ?></h6>
                                    <div class="comment-body">
                                        <p><?= $comment['comment'] ?>
                                            <br>

                                            <span class="text-right small icon-reply" data-num="<?= $comment['id'] ?>">Reply</span>
                                            <a href="/admin/comments/<?= $comment['id'] ?>/remove"><img
                                                        src="/public/svg/rubbish-bin.svg" class="icon-delete"
                                                        alt=""></a>

                                        </p>
                                    </div>

                                    <div class="answerForm" id="form-<?=$comment['id']?>">

                                        <h5 class="mb-2">Write answer</h5>
                                        <div class="control-group">
                                            <div class="form-group floating-label-form-group controls">
                                                <label>Message</label>
                                                <textarea rows="3" class="form-control" placeholder="Answer" id="message" required data-validation-required-message="Please enter a message.">ADMIN ANSWER</textarea>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <br>


                                        <div class="form-group">
                                            <button class="btn btn-primary" id="sendAnswer">Answer</button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<script>

    $(".icon-reply").click(function () {

        var id = $(this).attr("data-num");
        $("#form-"+id).toggle();

        /**
         * Оправляем ответ ajax на сервер,
         * ответ сразу же добавляем сюда под блок
         */

        $("#sendAnswer").click(function () {
            var answer = $("#message").val();

            $.ajax({
                type: 'POST',
                data: {
                    'answer': {
                        'message': answer,
                        'id': id
                    }
                },
                success: function (reply) {
                    console.log(reply);
                    var json = JSON.parse(reply);
                    console.log(json);
                }
            });

        });


    });
</script>