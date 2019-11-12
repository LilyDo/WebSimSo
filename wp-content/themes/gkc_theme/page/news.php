<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 11/11/2019
 * Time: 12:59 AM
 */

/**
 * Template Name: News
 * Template Post Type: page
 */

    get_header();
    $paging = ($_GET['paging'])? $_GET['paging'] : 1;

    $query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => $paging
    ]);

    $news = $query->posts;
    $all = $query->found_posts;
//    var_dump($all);

?>
<title>Mobifone Sai Gon - Tin Tức</title>
<div class="content">
    <div class="bannerCenter">
        <?php get_header('banner') ?>
    </div>

    <div class="pageAnchor">
        <div class="anchorHome"><a href="<?=get_site_url()?>"></a></div>
        <div class="anchorCurrent">TIN TỨC</div>
    </div>


    <div class="newsList">
        <?php foreach ($news as $item) : ?>
        <div class="news newsCard">
            <img class="newsImage" src="<?=get_the_post_thumbnail_url($item->ID)?>">

            <div class="newscontentContainer">
                <div class="newsTitle"><a href="<?=get_permalink($item->ID)?>"><?=get_the_title($item->ID)?></a></div>
                <div class="newsContent"><?=get_the_content('', false, $item->ID)?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <?php if ($all <= 20) : ?>

            <div class="numberContainer">
                <div class="pageNumber <?=($paging == 1)? 'current' : ''?>" onclick="location.href = '<?=processPage(1, $_GET)?>'">1</div>
                <?php for($i = 1; $i <= 4; $i++ ) : ?>
                    <?php if($all > $i * 5) : $index = $i + 1; ?>
                        <div class="pageNumber <?=($paging == $index)? 'current' : ''?>" onclick="location.href = '<?=processPage($index, $_GET)?>'"><?=$index?></div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

        <?php else: ?>

            <div><img src="<?= base_url() ?>/assets/images/icon_previous.svg" onclick="location.href = '<?=processPage(($paging == 1)? 1 : $paging - 1, $_GET)?>'"></div>
            <div class="numberContainer">
                <?php $start = ($paging == 1)? 2 : (($paging == $maxPage || $paging > $maxPage - 4)? $maxPage - 4 : $paging) ?>
                <div class="pageNumber <?=($paging == 1)? 'current' : ''?>" onclick="location.href = '<?=processPage(1, $_GET)?>'">1</div>
                <?php if($paging > 2) : ?>
                    <div class="pageNumber" onclick="location.href = '<?=processPage($paging - 2, $_GET)?>'">...</div>
                <?php endif; ?>
                <?php for($i = $start; $i <= $start + 3; $i++ ) : ?>
                    <div class="pageNumber <?=($paging == $i)? 'current' : ''?>" onclick="location.href = '<?=processPage($i, $_GET)?>'"><?=$i?></div>
                <?php endfor; ?>
                <?php if($paging <= ($maxPage - 5)) : ?>
                    <div class="pageNumber" onclick="location.href = '<?=processPage($paging + 4, $_GET)?>'">...</div>
                <?php endif; ?>
                <div class="pageNumber <?=($paging == $maxPage)? 'current' : ''?>" onclick="location.href = '<?=processPage($maxPage, $_GET)?>'"><?=$maxPage?></div>
            </div>
            <div><img src="<?=base_url()?>/assets/images/icon_next.svg" onclick="location.href = '<?=processPage(($paging == $maxPage)? $maxPage : $paging + 1, $_GET)?>'"></div>

        <?php endif; ?>
    </div>

</div>
<?php get_footer() ?>
