<div class="container">
    <div class="row" style="display: flex;justify-content: center;margin-top: 50px;">
        <div class="col-md-6">
            <div class="form-group">
                <input type="search" name="search" id="input-search" class="form-control"
                       placeholder="Search">
            </div>
<!--            <button type="submit" id="search" class="btn btn-primary">Submit</button>-->
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="display:flex; justify-content: center">
        <div class="col-md-6">

            <div class="post">
                <div class="elements">
                    <span class="login">login</span>
                    <span class="time">time</span>
                    <span class="category">category</span>
                </div>
                <div class="main">
                    <h2>Пожалуй, самая необычная головоломка на се</h2>
                    <img class="post-img" src="/public/img/img.png" alt="">
                    <p class="description">Это немного самонадеянно, но я решил озаглавить этот текст одним из отзывов о своей игре. На это есть две причины: первая — такая характеристика тешит мое самолюбие, признаюсь, чего уж скрывать. Вторая причина — мне бы хотелось, чтобы именно так воспринималась эта головоломка, а точнее целый набор, игроками.</p>
                </div>
                <div class="control">
                    <a href="#" class="full-reading">Full reading</a>
                    <a href="#" class="like-post"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    <a href="#" class="save-post"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row margin-top-30" style="display:flex; justify-content: center">
        <div class="col-md-6" id="found"></div>
    </div>
</div>
<script>

    var inp = $("#input-search")[0];

    inp.addEventListener("input", function () {

//        console.log(inp.value);
        var input = inp.value;
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {'input': input},
            success: function (json) {
                var json = JSON.parse(json);
                var reply = [];
                $.each(json, function (index, value) {
//                        console.log(json[index].id + json[index].title);
                    reply += '<div class="card flex-md-row mb-4 box-shadow h-md-250"><div class="card-body d-flex flex-column align-items-start"><strong class="d-inline-block mb-2 text-primary">' + json[index].category + '</strong> <h3 class="mb-0"> <a class="text-dark" href="/article/' + json[index].id + '">' + json[index].title + '</a></h3><div class="mb-1 text-muted">' + json[index].publication + '</div><p class="card-text mb-auto">' + json[index].description + '</p> <a href="/article/' + json[index].id + '">Continue reading</a></div></div>';
//                        reply += (json[index].id + json[index].title);
                });
//                    console.log(reply);
                $("#found").html(reply);
            }
        });

    }, false);
</script>