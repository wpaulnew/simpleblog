<!-- Main Content -->
<div class="login-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="control-group error-form">
                        <div class="form-group floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email"  class="form-control" placeholder="Email Address"
                                   id="email" required
                                   data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group error-form">
                        <div class="form-group floating-label-form-group controls">
                            <label>Password</label>
                            <input type="password"  class="form-control" placeholder="Password"
                                   id="password" required
                                   data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                </form>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="sendLoginButton" style="width: 100%;">Войти</button>
                </div>
            </div>
            <div id="success"></div>
        </div>
    </div>
</div>

<script>
    $("#sendLoginButton").click(
        function () {
            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                type: 'POST',
                url: '/login',
                data: {
                    'password': password,
                    'email': email,
                },
                success: function (reply) {
                    var json = JSON.parse(reply);

                    if (json) {
                        window.location.href = "/admin"
                    }

                    if (!json) {
                        $(".error-form").css("border-bottom", "solid 1px #f44336");
                    }


//                    if  (json.correct) {
//                        $("#contactForm").css("display","none");
//                        $("#success").css("display","block");
//                    }
                }
            });
        }
    );
</script>