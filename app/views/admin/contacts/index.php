<div class="container">
    <div class="row">
        <div class="col-md-12 me-contacts-list">
            <?php foreach ($contacts as $contact) : ?>
                <div class="contact-box contact-id-<?= $contact['id'] ?>">
                    <div class="contact-info">
                        <p><?= $contact['id'] ?></p>
                        <h3><?= $contact['name'] ?></h3>
                        <em><?= $contact['email'] ?></em>
                    </div>
                    <div class="contact-message">
                        <p><?= $contact['message'] ?></p>
                    </div>
                    <a class="contact-remove" data-id="<?= $contact['id'] ?>" style="cursor: pointer"><i class="fa fa-remove"></i></a>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    $(".contact-remove").click(function () {
        var id = $(this).attr("data-id");
        $.ajax({
            type: 'POST',
            data: {
                'id' : id
            },
            success: function (reply) {
                console.log(reply);
                var json = JSON.parse(reply);
                if (json.correct) {
//                    console.log(reply);
                    $(".contact-id-"+id).css("display", "none");
                }
            }
        });
    });
</script>