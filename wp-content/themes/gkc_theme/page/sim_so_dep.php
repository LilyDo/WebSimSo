<?php

	/**
     * Template Name: Sim So Dep
     * Template Post Type: page
     */

    get_header();
?>
    <title>Sim Số Đẹp</title>
    <div class="content">
        <div class="bannerCenter">
            <?php get_header('banner') ?>
        </div>
        <div class="pageAnchor">
            <div class="anchorHome"><a href="<?=get_site_url()?>">TRANG CHỦ</a></div>
            <div class="anchorCurrent"><a href="<?=get_site_url('', 'sim-so-dep')?>">SIM SỐ ĐẸP</a></div>
        </div>
        <form action="<?= get_site_url('', 'sim-so-dep') ?>" method="get">
            <?php get_header('search') ?>
        </form>
        <?php get_sidebar('data_paging') ?>
    </div>
    </div>

<?php get_footer() ?>