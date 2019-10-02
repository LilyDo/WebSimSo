<?php
// Data page
    $dauso = get_terms([
        'taxonomy' => 'fnumbers',
        'hide_empty' => false
    ]);

//    $loaiso = get_terms([
//        'taxonomy' => 'types',
//        'hide_empty' => false
//    ]);

    $loaitb = get_terms([
        'taxonomy' => 'tbtypes',
        'hide_empty' => false
    ]);

    $uudai = get_terms([
        'taxonomy' => 'promotes',
        'hide_empty' => false
    ]);
?>
<div class=searchTable>
    <div class="tableRow titleRow">
        <div class="title threeDimensionBlueButton" onmouseover="showTooltip(event)" onmouseout="hideTooltip()">HƯỚNG DẪN</div>
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
                    <?php $arrLoaiSo = getList() ?>
                    <?php foreach ($arrLoaiSo as $key => $item) : ?>
                        <option value="<?=$key?>" <?=($_GET['loaiso'] == $key)? 'selected' : '' ?>><?=$item?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="tableRow">
        <div class="rowHalf">
            <div class="oneThird">Lọc theo giá</div>
            <div class="twoThird">
                <select class="ui search dropdown fluid" name="gia">
                    <option value="all">Tất cả</option>
                    <?php $arrGia = getList('gia') ?>
                    <?php foreach ($arrGia as $key => $item) : ?>
                        <option value="<?=$key?>" <?=($_GET['gia'] == $key)? 'selected' : '' ?>><?=$item?></option>
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
        <button class="tableButton threeDimensionBlueButton" type="submit">
            <img src="<?= base_url() ?>/assets/images/icon_search.svg"/>
            TÌM KIẾM NGAY
        </button>
    </div>
</div>