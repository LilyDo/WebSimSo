<?php

    // Variables
    $paging = 1;

    $operation = 'NOT IN';
    if (get_permalink() == (get_site_url('','sim-so-dep') . '/'))
        $operation = 'IN';

    // Get data post
    if (isset($_GET['paging']) && $_GET['paging'] > 0)
        $paging = $_GET['paging'];

    $args = [
        'post_type' => 'sims',
        'paged' => $paging,
        'posts_per_page' => 20,
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field' => 'slug',
                'terms' => array ('so-dep'),
                'operator' => $operation
            )
        )
    ];

    $meta_query = ['relation' => 'AND'];

    if (isset($_GET['loaiso']) && $_GET['loaiso'] != 'all')
        $meta_query[] = makeDataQueryType($_GET['loaiso']);

    if (isset($_GET['loaitb']) && $_GET['loaitb'] != 'all')
        $args['tbtypes'] = $_GET['loaitb'];

    if (isset($_GET['gia']) && $_GET['gia'] != 'all')
        $meta_query[] = makeDataQueryCost($_GET['gia']);

    if (isset($_GET['so']) && $_GET['so'] != ''){
        $dauso = '';
        if (isset($_GET['dauso']) && $_GET['dauso'] != 'all')
            $dauso = $_GET['dauso'];
        $str = '^' . $dauso . str_replace('*', '.*', $_GET['so']) . "$";
        $meta_query[] = [
            'key' => 'number',
            'value' => $str,
            'compare' => 'REGEXP'
        ];
    }

    $args['meta_query'] = $meta_query;
    $args['meta_key'] = 'cost';
    $args['orderby'] = 'meta_value_num';
    $args['order'] = 'ASC';

    // Query
    $myQuery = new WP_Query($args);
//    var_dump($myQuery->request);

    $maxPage = $myQuery->max_num_pages;

    $data = $myQuery->posts;
    $all = $myQuery->found_posts;
?>
<div class=dataContent>
    <table class="simTable">
        <thead class="simTableHead">
        <tr>
            <th class="freezedHeaderColumn">
                <div class="boxShadowTopBottomLeft threeDimensionBlueBorderLeft">Số thuê bao</div>
            </th>
            <th class="invisibleTD"></th>
            <th>
                <div class="boxShadowTopBottom">Giá/ Phí hòa mạng</div>
            </th>
            <th>
                <div class="boxShadowTopBottom">Loại thuê bao</div>
            </th>
            <th>
                <div class="boxShadowTopBottom">Loại TB/ Cước cam kết (tháng)</div>
            </th>
            <th>
                <div class="boxShadowTopBottom">Địa điểm hòa mạng</div>
            </th>
            <th>
                <div class="boxShadowTopBottomRight threeDimensionBlueBorderRight">Mua</div>
            </th>
        </tr>
        </thead>
        <tbody class="simTableBody">
        <?php foreach ($data as $item) : ?>
            <tr>
                <td class="freezedBodyColumn"><div><?= $item->number ?></div></td>
                <td>
                    <div><?= number_format($item->cost) ?> VNĐ</div>
                </td>
                <td>
                    <div><?= testingNumberWithType($item->number, $operation) ?></div>
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
    <?php if ($all <= 100) : ?>

        <div class="numberContainer">
            <div class="pageNumber <?=($paging == 1)? 'current' : ''?>" onclick="location.href = '<?=processPage(1, $_GET)?>'">1</div>
            <?php for($i = 1; $i <= 4; $i++ ) : ?>
                <?php if($all > $i * 20) : $index = $i + 1; ?>
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