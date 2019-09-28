<?php

	/**
     * Template Name: Sim So Dep
     * Template Post Type: page
     */

    get_header();

    // Variables
    $paging = 1;

    // Get data post
    if (isset($_GET['paging']) && $_GET['paging'] > 0)
        $paging = $_GET['paging'];

    $args = [
        'post_type' => 'sims',
        'paged' => $paging,
        'posts_per_page' => 10,
        'meta_key' => 'cost',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field' => 'slug',
                'terms' => array ('so-dep'),
                'operator' => 'IN'
            )
        )
    ];

    if (isset($_GET['dauso']) && $_GET['dauso'] != '')
        $args['fnumbers'] = $_GET['dauso'];

    if (isset($_GET['loaiso']) && $_GET['loaiso'] != '')
        $args['types'] = $_GET['loaiso'];

    if (isset($_GET['loaitb']) && $_GET['loaitb'] != '')
        $args['tbtypes'] = $_GET['loaitb'];

    if (isset($_GET['uudai']) && $_GET['uudai'] != '')
        $args['promotes'] = $_GET['uudai'];

    if (isset($_GET['so']) && $_GET['so'] != ''){
        $arr = explode('*', $_GET['so']);
        $new = array_diff($arr, ['']);
        if (count($new) == 1) {
            $args['meta_query'] = [
                [
                    'key'       => 'number',
                    'value'     => $new[0],
                    'compare'   => 'LIKE',
                ]
            ];
        }
        if (count($new) == 2) {
            $reg = implode('.*', $new);
            $args['meta_query'] = [
                [
                    'key'       => 'number',
                    'value'     => $reg,
                    'compare'   => 'REGEXP',
                ]
            ];
        }
        
    }

    // Query
    $myQuery = new WP_Query($args);
    $maxPage = $myQuery->max_num_pages;

    $data = $myQuery->posts;
    $all = $myQuery->found_posts;
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
        <div class=dataContent>
            <table class="simTable">
                <thead class="simTableHead">
                <tr>
                    <th class="freezedHeaderColumn">Số thuê bao</th>
                    <th class="invisibleTD"></th>
                    <th>
                        <div>Giá/ Phí hòa mạng</div>
                    </th>
                    <th>
                        <div>Loại thuê bao</div>
                    </th>
                    <th>
                        <div>Loại TB/ Cước cam kết (tháng)</div>
                    </th>
                    <th>
                        <div>Địa điểm hòa mạng</div>
                    </th>
                    <th>
                        <div>Mua</div>
                    </th>
                </tr>
                </thead>
                <tbody class="simTableBody">
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td class="freezedBodyColumn"><div><?= $item->number ?></div></td>
                        <td>
                            <div><?= number_format($item->cost) ?></div>
                        </td>
                        <td>
                            <div><?= processPostTerms('types', $item->ID) ?></div>
                        </td>
                        <td>
                            <div><?= processPostTerms('tbtypes', $item->ID) ?></div>
                        </td>
                        <td>
                            <div><?= $item->address ?></div>
                        </td>

                        <td>
                            <div class="cart-cell">
                                <a href="<?=get_permalink($item->ID)?>">
                                    <div class="cart threeDimensionBlueButton threeDimensionShortBlueButton">
                                        <img src="<?= base_url() ?>/assets/images/icon_cart.svg">
                                        Mua
                                    </div>
                                </a>
                                <a href="<?=get_permalink($item->ID)?>">Chi tiết</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="pagination">
            <?php if ($all <= 50) : ?>

                <div class="numberContainer">
                    <div class="pageNumber <?=($paging == 1)? 'current' : ''?>" onclick="location.href = '<?=processPage(1, $_GET)?>'">1</div>
                    <?php for($i = 1; $i <= 4; $i++ ) : ?>
                        <?php if($all > $i * 10) : $index = $i + 1; ?>
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
    </div>

<?php get_footer() ?>