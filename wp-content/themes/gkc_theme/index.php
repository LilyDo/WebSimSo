<?php
    get_header();

    global $wpdb;
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

    if (isset($_GET['dauso']) && $_GET['dauso'] != 'all'){
        $args['fnumbers'] = $_GET['dauso'];
    }

    if (isset($_GET['loaiso']) && $_GET['loaiso'] != 'all')
        $args['types'] = $_GET['loaiso'];

    if (isset($_GET['loaitb']) && $_GET['loaitb'] != 'all')
        $args['tbtypes'] = $_GET['loaitb'];

    if (isset($_GET['uudai']) && $_GET['uudai'] != 'all')
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
?>
    <title>Trang chủ</title>
    <div class="content">
        <div class="bannerCenter">
            <?php get_header('banner') ?>
        </div>
        <form action="<?= get_site_url() ?>" method="get">
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
                    <input type="text" onkeyup="changePaging(this, event)" value="<?=$paging?>">
                    của <?=$maxPage?> trang
                </div>
            </div>
        </div>
    </div>
    </div>

<?php get_footer() ?>