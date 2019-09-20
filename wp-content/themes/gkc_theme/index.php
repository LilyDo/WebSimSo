<?php
    get_header();

    // Variables
    $paging = 1;

    // Data page
    $dauso = get_terms([
        'taxonomy' => 'fnumbers',
        'hide_empty' => false
    ]);

    $loaiso = get_terms([
        'taxonomy' => 'types',
        'hide_empty' => false
    ]);

    $loaitb = get_terms([
        'taxonomy' => 'tbtypes',
        'hide_empty' => false
    ]);

    $uudai = get_terms([
        'taxonomy' => 'promotes',
        'hide_empty' => false
    ]);

    // Get data post
    if (isset($_GET['paging']) && $_GET['paging'] > 0)
        $paging = $_GET['paging'];

    $args = [
        'post_type' => 'sims',
        'paged' => $paging,
        'posts_per_page' => 10
    ];

    if (isset($_GET['dauso']) && $_GET['dauso'] != 'all')
        $args['fnumbers'] = $_GET['dauso'];

    if (isset($_GET['loaiso']) && $_GET['loaiso'] != 'all')
        $args['types'] = $_GET['loaiso'];

    if (isset($_GET['loaitb']) && $_GET['loaitb'] != 'all')
        $args['tbtypes'] = $_GET['loaitb'];

    if (isset($_GET['uudai']) && $_GET['uudai'] != 'all')
        $args['promotes'] = $_GET['uudai'];

    if (isset($_GET['so']) && $_GET['so'] != ''){
        $args['meta_query'] = [
            [
                'key'	 	=> 'number',
                'value'	  	=> $_GET['so'],
                'compare' 	=> 'LIKE',
            ]
        ];
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
        <div class=searchTable>
            <form action="<?= get_site_url() ?>" method="get">
                <div class="tableRow titleRow">
                    <div class="title" onmouseover="showTooltip()" onmouseout="hideTooltip()">HƯỚNG DẪN</div>
                    <div class="tooltip">
                        <div class="tooltip-inner">
                            <div class="bg-intruction-search">
                                <p>
                                    <strong>Bước 1 :</strong> Chọn đầu số cần tìm. Ví dụ: chọn 090.
                                </p>
                                <p>
                                    <strong>Bước 2 :</strong> Nhập số cần tìm (không bao gồm đầu số): Có thể để trống khi bạn chưa có sẵn một số ưng ý. Hoặc bạn đã có một số ưng ý thì nhập theo quy tắc sau:
                                </p>
                                <p>
                                    <strong>1.</strong> Nhập chính xác số cần tìm. Ví dụ: 4896999
                                </p>
                                <p>
                                    <strong>2.</strong> Hoặc sử dụng dấu * đại diện cho một chuỗi số bất kỳ
                                </p>
                                <ul style="padding-left: 20px;">
                                    <li>a. Để tìm số bắt đầu bằng 88, nhập vào 88*</li>
                                    <li>b. Để tìm số kết thúc bằng 88, nhập vào *88 hoặc 88</li>
                                    <li>c. Để tìm số bắt đầu bằng 88 và kết thúc bằng 99, nhập vào 88*99</li>
                                    <li>d. Để tìm số chứa 88, nhập vào *88*</li>
                                    <li>e. Để tìm số chứa 88 và 99, nhập vào *88*99*</li>
                                </ul>
                                <p></p>
                                <p>
                                    <strong>Bước 3 :</strong> Chọn Loại số: Chọn một loại số đẹp cụ thể cho Số cần tìm hoặc để “Không chọn” khi bạn muốn tìm số trong tất cả các Loại số.
                                </p>
                                <p>
                                    <strong>Bước 4 :</strong> Lựa chọn thêm các tiêu chí tìm kiếm:

                                </p>
                                <ul style="padding-left: 20px;">
                                    <li>a. Ví dụ, muốn tìm Loại thuê bao là “Trả sau”, bạn tích vào hộp chọn của Loại thuê bao và chọn giá trị là “Trả sau”.
                                    </li>
                                    <li>b. Có thể tìm theo cước cam kết và thời gian cam kết của thuê bao.</li>
                                </ul>
                                <p></p>
                                <p>
                                    <strong>Bước 5 :</strong> Click chọn “TÌM KIẾM” khi bạn đã thiết lập xong các điều kiện tìm kiếm.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div class="rowHalf">
                        <div class="oneThird">Tìm số</div>
                        <div class="oneThird">
                            <select class="ui search dropdown fluid" name="dauso">
                                <option value="all">Chọn đầu số</option>
                                <?php foreach ($dauso as $item) : ?>
                                    <option value="<?= $item->slug ?>" <?=isset($_GET['dauso'])? (($_GET['dauso'] == $item->slug)? 'selected' : '') : ''?> ><?= $item->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="oneThird">
                            <div class="ui input fluid">
                                <input type="text" placeholder="Nhập số cần tìm" name="so" value="<?=isset($_GET['so'])? $_GET['so']: ''?>">
                            </div>
                        </div>
                    </div>
                    <div class="rowHalf">
                        <div class="oneThird">Loại số</div>
                        <div class="twoThird">
                            <select class="ui search dropdown fluid" name="loaiso">
                                <option value="all">Tất cả</option>
                                <?php foreach ($loaiso as $item) : ?>
                                    <option value="<?= $item->slug ?>" <?=isset($_GET['loaiso'])? (($_GET['loaiso'] == $item->slug)? 'selected' : '') : ''?> ><?= $item->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <div class="rowHalf">
                        <div class="oneThird">Ưu đãi</div>
                        <div class="twoThird">
                            <select class="ui search dropdown fluid" name="uudai">
                                <option value="all">Tất cả</option>
                                <?php foreach ($uudai as $item) : ?>
                                    <option value="<?= $item->slug ?>" <?=isset($_GET['uudai'])? (($_GET['uudai'] == $item->slug)? 'selected' : '') : ''?> ><?= $item->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="rowHalf">
                        <div class="oneThird">Loại thuê bao</div>
                        <div class="twoThird">
                            <select class="ui search dropdown fluid" name="loaitb">
                                <option value="all">Tất cả</option>
                                <?php foreach ($loaitb as $item) : ?>
                                    <option value="<?= $item->slug ?>" <?=isset($_GET['loaitb'])? (($_GET['loaitb'] == $item->slug)? 'selected' : '') : ''?> ><?= $item->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tableRow">
                    <button class="tableButton" type="submit">
                        <img src="<?= base_url() ?>/assets/images/icon_search.svg"/>
                        TÌM KIẾM NGAY
                    </button>
                </div>
            </form>
        </div>
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