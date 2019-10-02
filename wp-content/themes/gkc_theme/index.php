<?php
    get_header();
?>
    <title>Trang chủ</title>
    <div class="content">
        <div class="bannerCenter">
            <?php get_header('banner') ?>
        </div>
        <form action="<?= get_site_url() ?>" method="get">
            <?php get_header('search') ?>
        </form>
        <?php get_sidebar('data_paging')?>
    </div>

<?php get_footer() ?>