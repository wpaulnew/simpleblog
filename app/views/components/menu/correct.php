<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">


        <input type="text" id="correct-element-logo" class="navbar-brand correct" name="" value="Start Bootstrap">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!--<a class="nav-link" href="index.html">Home</a>-->
                    <input type="text" id="correct-element-home" class="navbar-brand correct-elements" name="" value="Home">
                </li>
                <li class="nav-item">
                    <input type="text" id="correct-element-about" class="navbar-brand correct-elements" name="" value="About">
                </li>
                <li class="nav-item">
                    <input type="text" id="correct-element-contact" class="navbar-brand correct-elements" name="" value="Contact">
                </li>

                <?php if (isset($_SESSION['Authorized'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="post.html">Add</a>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link" href="post.html">Login</a>
                </li>

            </ul>
        </div>

    </div>
</nav>

