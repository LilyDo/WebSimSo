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
        'posts_per_page' => 10
    ];

    if (isset($_GET['dauso']) && $_GET['dauso'] != '')
        $args['fnumbers'] = $_GET['dauso'];

    if (isset($_GET['loaiso']) && $_GET['loaiso'] != '')
        $args['types'] = $_GET['loaiso'];
    else
        $args['types'] = 'so-dep';

    if (isset($_GET['loaitb']) && $_GET['loaitb'] != '')
        $args['tbtypes'] = $_GET['loaitb'];

    if (isset($_GET['uudai']) && $_GET['uudai'] != '')
        $args['promotes'] = $_GET['uudai'];

    if (isset($_GET['so']) && $_GET['so'] != ''){
        $args['meta_query'] = [
            [
                'key'       => 'number',
                'value'     => $_GET['so'],
                'compare'   => 'LIKE',
            ]
        ];
    }

    // Query
    $myQuery = new WP_Query($args);
    $maxPage = $myQuery->max_num_pages;

    $data = $myQuery->posts;
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
                    <th>Số thuê bao</th>
                    <th>Giá/ Phí hòa mạng</th>
                    <th>Loại thuê bao</th>
                    <th>Loại TB/ Cước cam kết (tháng)</th>
                    <th>Địa điểm hòa mạng</th>
                    <th>Mua</th>
                </tr>
                </thead>
                <tbody class="simTableBody">
                <?php foreach ($data as $item) : ?>
                    <tr>
                        <td><?= $item->number ?></td>
                        <td><?= number_format($item->cost) ?></td>
                        <td><?= processPostTerms('types', $item->ID) ?></td>
                        <td><?= processPostTerms('tbtypes', $item->ID) ?></td>
                        <td><?= $item->address ?></td>
                        <td class="cart-cell">
                            <a href="<?=get_permalink($item->ID)?>">
                                <div class="cart">
                                    <img src="<?= base_url() ?>/assets/images/icon_cart.svg">
                                    Mua
                                </div>
                            </a>
                            <a href="<?=get_permalink($item->ID)?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="pagination">
                <div class="paginationDiv"></div>
                <div class="paginationDiv paginationButtons">
                    <?php if ($paging > 1) : ?>
                        <button class="previous" onclick="location.href = '<?=processPage(($paging == 1)? 1 : $paging - 1, $_GET)?>'">
                            <img src="<?= base_url() ?>/assets/images/arrow_left.svg">
                            Trang trước
                        </button>
                    <?php endif; ?>
                    <?php if ($paging < $maxPage) : ?>
                        <button class="next" onclick="location.href = '<?=processPage(($paging == $maxPage)? $maxPage : $paging + 1, $_GET)?>'">
                            Trang kế tiếp
                            <img src="<?= base_url() ?>/assets/images/arrow_right.svg">
                        </button>
                    <?php endif; ?>
                </div>
                <div class="paginationDiv pageNumbers">
                    Trang
                    <input type="text" onkeyup="" value="<?=$paging?>">
                    của <?=$maxPage?> trang
                </div>
            </div>
        </div>
    </div>
    </div>

<?php get_footer() ?>