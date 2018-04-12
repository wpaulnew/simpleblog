<div class="container">
    <div class="row" style="margin-top: 50px; display: flex; justify-content: center;">
        <div class="col-md-12 reply-close">
            <form method="POST" id="create" style="margin-top: 50px">

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" class="form-control-file" id="upload-file" aria-describedby="fileHelp">
                </div>

                <div class="form-group">
                    <label for="usr">Title:</label>
                    <input type="text" id="title" class="form-control" id="usr">
                </div>
                <div class="form-group">
                    <label for="usr">Description:</label>
                    <input type="text" id="description" class="form-control" id="usr">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Text:</label>
                    <textarea class="ckeditor" name="editor" id="text"></textarea>
                </div>
            </form>
            <button type="submit" class="btn btn-primary" id="add" style="width: 100%">Опубликовать</button>
            <br>
            <br>
            <button type="submit" class="btn btn-dark" id="preview" style="width: 100%; margin-bottom: 40px">Preview</button>

            <div id="view" class="margin-top-30"></div>
        </div>
        <div class="col-md-6 reply-show" style="display: none; margin-top: 50px">
            <div class="alert alert-success" role="alert">
                Статья успешно добавлена
            </div>
        </div>
    </div>
</div>

<div id="menu"></div>
<div id="sample">

    <script>
        $('#add').click(function () {
            var upload = $("#upload-file").val();
            var title = $("#title").val();
            var description = $("#description").val();
            var text = CKEDITOR.instances['text'].getData();


            if (upload != "" && title != "" && description != "" && text != "") {
                var input = $("#upload-file");
                var fd = new FormData;

                fd.append('pictures', input.prop('files')[0]);

                $.ajax({
//                url: '/admin/add',
                    data: fd,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (img) {

                        $.ajax({
                            type: 'POST',
//                        url: '',
                            data: {
                                'img': img,
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
                    }
                })
            } else {
                console.log("Fill in all the fields");
            }
        });
    </script>

    <script>
        $('#preview').click(function () {
            var text = CKEDITOR.instances['text'].getData();
            console.log(text);
            $("#view").html(text);
        });
    </script>

