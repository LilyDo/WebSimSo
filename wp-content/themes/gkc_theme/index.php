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
                <div><img src="<?=base_url()?>/assets/images/icon_previous.svg"></div>
                <div class="numberContainer">
                    <?php $start = ($paging == 1)? 2 : (($paging == $maxPage || $paging > $maxPage - 4)? $maxPage - 4 : $paging) ?>
                    <div class="pageNumber <?=($paging == 1)? 'current' : ''?>" onclick="location.href = '<?=processPage(1, $_GET)?>'">1</div>
                    <?php if($paging > 6) : ?>
                        <div class="pageNumber" onclick="location.href = '<?=processPage($paging - 4, $_GET)?>'">...</div>
                    <?php endif; ?>
                    <?php for($i = $start; $i <= $start + 3; $i++ ) : ?>
                        <div class="pageNumber <?=($paging == $i)? 'current' : ''?>" onclick="location.href = '<?=processPage($i, $_GET)?>'"><?=$i?></div>
                    <?php endfor; ?>
                    <?php if($paging < ($maxPage - 6)) : ?>
                        <div class="pageNumber" onclick="location.href = '<?=processPage($paging + 4, $_GET)?>'">...</div>
                    <?php endif; ?>
                    <div class="pageNumber <?=($paging == $maxPage)? 'current' : ''?>" onclick="location.href = '<?=processPage($maxPage, $_GET)?>'"><?=$maxPage?></div>
                </div>
                <div><img src="<?=base_url()?>/assets/images/icon_next.svg"></div>
            </div>
        </div>
    </div>
    </div>

<?php get_footer() ?>