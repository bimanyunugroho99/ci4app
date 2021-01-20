<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Hello World!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="/jadwal">Jadwal Kuliah</a>
                        <a class="nav-link" href="/pages/about">About</a>
                        <a class="nav-link" href="/pages/contact">Contact Us</a>
                    </div>
                    <?php if (logged_in()) : ?>
                        <a href="/logout" class="btn btn-danger mx-4">Logout</a>
                    <?php else : ?>
                        <a href="/login" class="btn btn-danger mx-4">Login</a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
    </div>
</div>