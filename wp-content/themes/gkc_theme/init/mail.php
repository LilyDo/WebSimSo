<?php

function mail_buy($data)
{
	$content_mail = '
    <h1 style="text-align: center"><b>ĐĂNG KÝ MUA SIM</b></h1>
    <p style="text-align: center; font-style: italic;">mobifonesaigon.com.vn</p>
	<h3>Có khách hàng đã đăng ký mua sim với thông tin như sau:</h3>
	<p><b>Số Sim</b>: ' . $data["sim"] . '</p>
	<p><b>Tên khách hàng</b>: ' . $data["name"] . '</p>
	<p><b>Số điện thoại liên hệ</b>: ' . $data["phone"] . '</p>
	<p><b>Địa chỉ thường trú (nơi ở hiện tại)</b>: ' . $data["address"] . '</p>
	<p><b>Số Chứng minh thư / Thẻ căn cước</b>: ' . $data["cmnd"] . '</p>
	<p><b>Hình thức thanh toán</b>: ' . $data["thanh_toan"] . '</p>
	<p><b>Hình thức giao sim</b>: ' . $data["giao_sim"] . '</p>
	<p><b>Gói cước đăng ký</b>: ' . $data["package"] . '</p>
	<p><b>Hình ảnh 1</b>: <a href="' . $data["path_1"] . '" target="_blank">Open</a></p>
	<a><b>Hình ảnh 2</b>: <a href="' . $data["path_2"] . '" target="_blank">Open</a></p>';

	return $content_mail;
}

function mail_recharge($data){
    $content_mail = '
    <h1 style="text-align: center"><b>NẠP TIỀN ĐIỆN THOẠI</b></h1>
    <p style="text-align: center; font-style: italic">mobifonesaigon.com.vn</p>
	<h3>Có khách hàng đã đăng ký nạp tiền cho thuê bao với thông tin như sau:</h3>
	<p><b>Số thuê bao</b>: ' . $data["phone"] . '</p>
	<p><b>Nhà mạng</b>: ' . $data["network"] . '</p>
	<p><b>Loại thuê bao</b>: ' . $data["payment"] . '</p>
	<p><b>Số tiền</b>: ' . number_format($data["amount"]) . ' VNĐ' . '</p>';

    return $content_mail;
}