<?php
/**
 * Template Name: Detail Page
 * Template Post Type: sims
 */
get_header();
?>
    <title>Chi tiết sim <?=get_field('number')?></title>
    <div class="content">
        <form id="registerInfo">
        <input type="hidden" name="sim_number" value="<?=get_field('number')?>">
        <div class="bannerCenter">
            <img src="<?= base_url() ?>/assets/images/banner_center.png">
        </div>

        <div class="simNumber">
            <div class="title">THÔNG TIN CHI TIẾT SIM SỐ</div>
            <div class="number"><?=get_field('number')?></div>
        </div>
        <div class="simDetail">
            <table class="numberDetail">
                <col width="30%">
                <col width="70%">

                <tr>
                    <td>Loại thuê bao</td>
                    <td><?= processPostTerms('tbtypes', get_the_ID()) ?></td>
                </tr>
                <tr>
                    <td>Loại số</td>
                    <td><?= processPostTerms('types', get_the_ID()) ?></td>
                </tr>
                <tr>
                    <td>Giá sim</td>
                    <td><?=number_format(get_field('cost'))?> vnd</td>
                </tr>
                <tr>
                    <td>Cước thuê bao</td>
                    <td><?= (get_field('cuoc_tb'))? get_field('cuoc_tb') : "Không bao gồm cước thuê bao" ?></td>
                </tr>
                <tr>
                    <td>Cước cam kết</td>
                    <td><?= get_field('cuoc_ck') ?></td>
                </tr>
                <tr>
                    <td>Thời gian cam kết</td>
                    <td><?= get_field('thoigian_ck') ?></td>
                </tr>
                <tr>
                    <td>Gói cước khác (không bắt buộc)</td>
                    <td>
                        <?php foreach (getList('goicuoc',get_the_ID()) as $key => $value) : ?>
                            <label for="<?=$key?>">
                                <input type="radio" value="<?=$key?>" id="<?=$key?>" name="package" <?=('CK150' == $key)? 'checked' : '' ?>>
                                <?= $value?>
                            </label><br>
                        <?php endforeach; ?>
                    </td>
                </tr>
            </table>

            <div class="numberRegister">

                <div class="title">THÔNG TIN ĐĂNG KÝ KHI MUA SIM</div>

                <div class="registerInfo">
                    <label for="name">Họ tên</label> <br>
                    <input type="text" class="name" name="name">
                </div>

                <div class="registerInfo">
                    <label for="phone">Số điện thoại liên hệ</label> <br>
                    <input type="text" class="phone" name="phone">
                </div>

                <div class="registerInfo">
                    <label for="address">Địa chỉ thường trú (nơi ở hiện tại)</label> <br>
                    <input type="text" class="address" name="address">
                </div>

                <div class="special">
                    <div>Số Chứng minh thư / Thẻ căn cước của bạn</div>
                    <div class="uploadContainer">
                        <input type="text" class="id" name="cmnd">
                        <div class="uploadContainer">
                            <div>
                                <div class="uploadRequest">
                                    <img src="<?= base_url() ?>/assets/images/icon_upload.png" onclick="$('#file_upload').click()">
                                    <div>
                                        <label for="file_upload">
                                            <input type="file" id="file_upload" style="display: none" onchange="previewImage(this, '1|2')"  accept="image/*">
                                        </label>
                                    </div>
                                    <div class="text">
                                        Upload hình ảnh <br> CMND/ Thẻ căn cước
                                    </div>
                                </div>
                            </div>
                            <div class="uploadPhoto">
                                <img src id="photo_1">mặt trước
                            </div>
                            <div class="uploadPhoto">
                                <img src id="photo_2">mặt sau
                            </div>
                        </div>

                    </div>

                </div>
                <div class="document uploadContainer">
                    <div class="requestText">Chụp ảnh chân dung của bạn</div>
                    <div class="uploadRequest">
                        <div>
                            <label for="upload_avatar">
                                <input type="file" class="hidden" id="upload_avatar" style="display: none" onchange="previewImage(this, '3')"  accept="image/*">
                                <img src="<?= base_url() ?>/assets/images/icon_upload.png">
                            </label>
                            <div class="text">Upload hình ảnh <br>
                                chân dung của bạn
                            </div>
                        </div>
                        <div class="uploadPhoto">
                            <img src id="photo_3">
                        </div>
                    </div>
                </div>
                <div class="document uploadContainer">
                    <div class="requestText">Chụp chữ ký của bạn</div>
                    <div class="uploadRequest">
                        <div>
                            <label for="upload_sign">
                                <input type="file" class="hidden" id="upload_sign" style="display: none" onchange="previewImage(this, '4')"  accept="image/*">
                                <img src="<?= base_url() ?>/assets/images/icon_upload.png"">
                            </label>
                            <div class="text">Upload hình ảnh <br>
                                chữ ký của bạn
                            </div>
                        </div>
                        <div class="uploadPhoto">
                            <img src id="photo_4">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="noteText">Nếu nơi cấp CMND/ Thẻ căn cước không ở Hồ Chí Minh, vui lòng cung cấp thêm thông
                        tin sau:
                    </div>
                    <div>Hộ khẩu/ tạm trú của bạn</div>
                    <div class="uploadContainer">
                        <div class="flexLeft">
                            <label for="upload_hokhau">
                                <input type="file" class="hidden" id="upload_hokhau" style="display: none" onchange="previewImage(this, '5|6|7|8')"  accept="image/*">
                                <img src="<?= base_url() ?>/assets/images/icon_upload.png"">
                            </label>
                            <div class="text">Upload hình ảnh hộ khẩu/<br> tạm trú
                            </div>
                        </div>

                        <div class="flexRight">
                            <div class="uploadPhoto">
                                <img src id="photo_5">mặt bìa trước
                            </div>
                            <div class="uploadPhoto">
                                <img src id="photo_6">mặt 1
                            </div>
                            <div class="uploadPhoto">
                                <img src id="photo_7">mặt 2
                            </div>
                            <div class="uploadPhoto">
                                <img src id="photo_8">mặt có tên của bạn
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="simOrder">
            <div class="title">HƯỚNG DẪN ĐẶT MUA SIM</div>
            <div>Vui lòng chọn hình thức mua sim phù hợp với bạn:</div>

             <div class="orderForm">
                <div class="payment">
                    <div class="text">HÌNH THỨC THANH TOÁN:</div>
                    <div class="checkBox">
                        <div><input type="radio" name="thanh_toan" value="cod" class="COD" checked=""></div>
                        <div>
                            Thanh toán khi nhận sim (COD) <br>
                            Phí ship từ 15 - 25k tùy địa điểm giao sim.
                        </div>
                    </div>
                    <div class="checkBox">
                        <div><input type="radio" name="thanh_toan" value="ibanking" class="ibanking"></div>
                        <div>
                            Thanh toán chuyển khoản (Internet banking) <br>
                            Miễn phí ship và phí chuyển khoản.
                        </div>
                    </div>
                </div>

                <div class="delivery">
                    <div class="text">HÌNH THỨC GIAO SIM:</div>

                    <div class="checkBox">
                        <div><input type="radio" name="giao_sim" value="store" class="store" checked=""></div>
                        <div>
                            Khách hàng đến trực tiếp cty lấy sim tại: 249 Minh Phụng, phường 2, Quận 11, TP.HCM. <br>
                        </div>
                    </div>

                    <div class="checkBox">
                        <div><input type="radio" name="giao_sim" value="delivery" class="delivery"></div>
                        <div class="deliveryContainer">
                            <span>Giao tận nơi</span>
                            <input type="text" class="deliveryAddress" name="address_delivery" placeholder="Nhập địa chỉ nhận sim tại đây">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="buttonContainer">
            <button class="orderButton threeDimensionRedButton" type="button" onclick="submitData(this)">MUA NGAY
            </button>
            <img class="img_loading" src="<?=base_url()?>/assets/images/loading.gif" alt="" style="display: none;position: absolute; width: 15%;">
        </div>

        <div class="mapContainer">
            <div class="title">BẢN ĐỒ HƯỚNG DẪN</div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1103.7294265885291!2d106.64268682893557!3d10.755253992458236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e8f24cb2c25%3A0xbbb439ace223acb9!2zMjQ5IE1pbmggUGjhu6VuZywgUGjGsOG7nW5nIDIsIFF14bqtbiAxMSwgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2ssg!4v1568374428819!5m2!1sen!2ssg"
                    width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </form>
    </div>

<?php get_footer() ?>