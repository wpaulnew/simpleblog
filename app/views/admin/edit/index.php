<div class="container">
    <div class="row" style="margin-top: 50px; display: flex; justify-content: center;">
        <div class="col-md-6 reply-close">
            <form method="POST" id="create" style="margin-top: 50px">
                <!--                <div class="form-group">-->
                <!--                    <label for="exampleInputFile">File input</label>-->
                <!--                    <input type="file" class="form-control-file" id="upload-file" aria-describedby="fileHelp">-->
                <!--                </div>-->
                <div class="form-group">
                    <label for="usr">Title:</label>
                    <input type="text" value="<?= $roll['title'] ?>" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="usr">Description:</label>
                    <input type="text" value="<?= $roll['description'] ?>" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Text:</label>
                    <textarea class="ckeditor" name="editor" id="text">
                         <?= $roll['text'] ?>
                    </textarea>
                </div>


            </form>
            <button type="submit" class="btn btn-primary" id="edit">Редактировать</button>
            <button type="submit" class="btn btn-dark" id="preview">Preview</button>

            <div id="view" class="margin-top-30"></div>
        </div>
        <div class="col-md-6 reply-show" style="display: none; margin-top: 50px">
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> You successfully read this important alert message.
            </div>
        </div>
    </div>
</div>

<div id="menu"></div>
<div id="sample">

<script>
    $('#edit').click(function () {

        var title = $("#title").val();
        var description = $("#description").val();
        var text = CKEDITOR.instances['text'].getData();

//            var = CKEDITOR.instances['text'].getData();
//            var text = $("#view").html(editor_text);

        $.ajax({
            type: 'POST',
            data: {
                'title': title,
                'description': description,
                'text': text
            },
            success: function (reply) {
//                            console.log(reply);
                var json = JSON.parse(reply);
                if (json) {
                    $(".reply-close").css("display", "none");
                    $(".reply-show").css("display", "block");
                }
            }
        });
    });
</script>

<script>
    $('#preview').click(function () {
        var text = CKEDITOR.instances['text'].getData();
        console.log(text);
        $("#view").html(text);
    });
</script>

