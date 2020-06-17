<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="blog-post">
    <div class="container mt-5">
        <h2 class="text-muted">
            <a href="<?php echo site_url(); ?>" class="text-reset">Blog Posts</a>
        </h2>
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-bold"><?php echo $post->title; ?>
                </h2>
                <p><?php echo $post->created_at . ' by Gun Gun Priatna'; ?></p>
                <?php echo $post->content; ?>
            </div>
        </div>
    </div>

</section>



<?= $this->endSection() ?>