<!-- Page Header -->
<header class="masthead" style="background-image: url('/public/img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Свяжитесь со мной</h1>
                    <span class="subheading">У вас вопросы? У меня есть ответы</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>Хотите связаться? Заполните форму ниже, чтобы отправить мне сообщение, и я свяжусь с вами как можно
                скорее!</p>
            <div id="success" style="margin-bottom: 50px">
                <div class="alert alert-success">
                    Контакты отправлены
                </div>
            </div>


            <div class="container content">
                <div id="success">
                    <div class="alert alert-success">
                        Контакты отправлены
                    </div>
                </div>
                <form class="form-horizontal" method="post" id="form">
                    <div class="form-group controls">
                        <label for="name" class="control-label">Имя <span class="red">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Имя" required>
                    </div>
                    <div class="form-group controls">
                        <label for="email" class="control-label">Email <span class="red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group controls">
                        <label for="email" class="control-label">Message <span class="red">*</span></label>
                        <textarea rows="5" class="form-control" name="message" placeholder="Message" id="message" required></textarea>
                    </div>
                    <div class="form-group ">
                        <button type="submit" id="submit" class="btn btn-primary" style="width: 100%; margin-top: 30px; margin-bottom: 70px">
                            Отправить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('#form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                }
            },
            messages: {
                name: {
                    required: "Поле 'Имя' обязательно к заполнению",
                    minlength: "Введите не менее 2-х символов в поле 'Имя'"
                },
                email: {
                    required: "Поле 'Email' обязательно к заполнению",
                    email: "Необходим формат адреса email"
                },
                message: {
                    required : "Поле 'Message' обязательно к заполнению"
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '/contact',
                    type: 'POST',
                    data: $(form).serialize(),
                    success: function (reply) {
                        var json = JSON.parse(reply);
                        if (json.correct) {
                            $(".form-horizontal").css("display", "none");
                            $("#success").css("display", "block");
                        }
                    }
                });
            }
        });
    });
</script>

