<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8 my-2">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/img1.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <blockquote class="blockquote text-center">
                                <p class="card-text">"Error! akan mengajarimu bagaimana cara menyelesaikan masalah.."</p>
                                <footer class="blockquote-footer">BimanyuNF <cite title="Source Title">@2020/2021</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>