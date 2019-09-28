<?php
    /*
     * Template Name: Nap tien
     * Template Post Type: page
     */
    get_header();
?>
<title>Nạp tiền</title>
<div class="content">
    <div class="bannerCenter">
        <?php get_header('banner') ?>
    </div>
    <div class="pageAnchor">
        <div class="anchorHome">TRANG CHỦ</div>
        <div class="anchorCurrent">NẠP TIỀN</div>
    </div>

    <div class="contentContainer">
        <form id="recharge">
            <input type="hidden" name="amount" value="20000">
            <div class="note">Lưu ý: Quý khách hàng vui lòng thực hiện giao dịch bằng đầu số mới theo thông báo từ nhà mạng.
                Xin
                chân thành cảm ơn!
            </div>
            <div class="step1">BƯỚC 1: </div>
            <div class="text">Chọn nhà mạng </div>
            <div class="carrierContainer">
                <label>
                    <input class="checkmark" type="radio" name="network" value="Mobifone" checked>
                    <img src="<?= base_url() ?>/assets/images/logo_mobifone.svg">
                </label>
                <label>
                    <input class="checkmark" type="radio" name="network" value="Vinaphone">
                    <img src="<?= base_url() ?>/assets/images/logo_vinaphone.svg">
                </label>
                <label>
                    <input class="checkmark" type="radio" name="network" value="Viettel">
                    <img src="<?= base_url() ?>/assets/images/logo_viettel.svg">
                </label>
            </div>
            <div class="text">Nhập số điện thoại của bạn:</div>
            <div class="phoneNumber">
                <input type="text" name="phone">
            </div>
            <div class="text">Loại thuê bao</div>
            <div class="paymentPlan">
                <label>
                    <input type="radio" name="paymentPlan" value="pre" checked>
                    Trả trước
                </label>
                <label>
                    <input type="radio" name="paymentPlan" value="post">
                    Trả sau
                </label>
            </div>

            <div class="step2">BƯỚC 2:</div>
            <div class="text">Chọn mệnh giá:</div>
            <div class="amountContainer">
                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber selected" onclick="changeAmount(this)">
                        <div class="bigNumber">20,000 đ</div>
                        <div class="smallNumber">18,000 đ</div>
                    </div>
                </div>

                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber" onclick="changeAmount(this)">
                        <div class="bigNumber">40,000 đ</div>
                        <div class="smallNumber">36,000 đ</div>
                    </div>
                </div>

                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber" onclick="changeAmount(this)">
                        <div class="bigNumber">50,000 đ</div>
                        <div class="smallNumber">45,000 đ</div>
                    </div>
                </div>


                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber" onclick="changeAmount(this)">
                        <div class="bigNumber">100,000 đ</div>
                        <div class="smallNumber">90,000 đ</div>
                    </div>
                </div>

                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber" onclick="changeAmount(this)">
                        <div class="bigNumber">200,000 đ</div>
                        <div class="smallNumber">180,000 đ</div>
                    </div>
                </div>

                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber" onclick="changeAmount(this)">
                        <div class="bigNumber">300,000 đ</div>
                        <div class="smallNumber">270,000 đ</div>
                    </div>
                </div>

                <div class="amount">
                    <div class="discountPercent">-10%</div>
                    <div class="amountNumber" onclick="changeAmount(this)">
                        <div class="bigNumber">500,000 đ</div>
                        <div class="smallNumber">450,000 đ</div>
                    </div>
                </div>
            </div>

            <div class="luuY">Lưu ý:</div>
            <div class="luuYText">
                Thuê bao Mobifone cần nhập thêm mã xác nhận OTP (gồm 6 chữ số gửi qua SMS) trong 2 trường hợp sau: <br>
                + Là thuê bao trả sau<br>
                + Thuê bao trả trước trong ngày khuyến mãi 20%<br>
            </div>
            <div class="topUpContainer">
                <button class="topUpButton threeDimensionRedButton" type="button" onclick="recharge()">NẠP NGAY
                </button>
            </div>
        </form>
    </div>
</div>
<?php get_footer() ?>
