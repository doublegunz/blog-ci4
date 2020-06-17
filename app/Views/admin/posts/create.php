<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?= $title ?>
                </div>
                <div class="card-body">

                    <?= form_open('admin/post/store'); ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>" aria-describedby="titleHelpBlock" required>
                        <small id="titleHelpBlock" class="text-danger">
                            <?php echo $errors['title'] ?? '' ?>
                        </small>

                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="post_content" class="form-control" aria-describedby="contentHelpBlock" required><?php echo set_value('content');?></textarea>
                        <small id="contentHelpBlock" class="text-danger">
                            <?php echo $errors['content'] ?? '' ?>
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <small id="statusHelpBlock" class="text-danger">
                            <?php echo $errors['status'] ?? ''; ?>
                        </small>
                        <select name="status" id="" class="form-control" aria-describedby="statusHelpBlock" required>
                            <option value="1" selected>Draft</option>
                            <option value="2">Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                        <a href="<?= site_url('admin/post') ?>" class="btn btn-link">Back</a>
                    </div>
                    <?= form_close(); ?>





                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#post_content').summernote({
            tabsize: 2,
            height: 500
        });
    })
</script>
<?= $this->endSection() ?>