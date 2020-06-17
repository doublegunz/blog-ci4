<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="blog-post">
    <div class="container mt-5">
        <h2 class="text-muted">
            <a href="<?php echo site_url(); ?>" class="text-reset">Blog Posts</a>
        </h2>
        <div class="row">
            <?php if ($posts) : ?>
                <?php foreach ($posts as $post) : ?>

                    <div class="col-md-12">
                        <h2 class="text-muted">
                            <a href="<?php echo site_url('post/detail/' . $post->id); ?>" class="text-reset font-weight-bold">
                                <?php echo $post->title; ?>
                            </a>
                        </h2>
                        <p><?php echo $post->created_at . ' by Gun Gun Priatna'; ?></p>
                        <p><?php echo substr(strip_tags($post->content), 0, 100); ?> [...]</p>
                    </div>


                <?php endforeach; ?>
                <?php else: ?>
                <div class="col-md-12 mt-3">
                    <h5 class="text-muted">No post found.</h5>

                </div>

                <?php endif; ?>
        </div>

        <div class="text-center mt-3">
            <?= $pager->links(); ?>
        </div>
    </div>

</section>



<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    $(document).ready(function() {
        $('.pagination li').addClass('page-item');
        $('.pagination li a').addClass('page-link');
    })
</script>
<?= $this->endSection() ?>