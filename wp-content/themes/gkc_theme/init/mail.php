<?php

function mail_buy($data)
{
	$content_mail = '
	<h3>Có khách hàng đã đăng ký mua sim với thông tin như sau:</h3>
	<p><b>Số Sim</b>: ' . $data["sim"] . '</p>
	<p><b>Tên khách hàng</b>: ' . $data["name"] . '</p>
	<p><b>Số điện thoại liên hệ</b>: ' . $data["phone"] . '</p>
	<p><b>Địa chỉ thường trú (nơi ở hiện tại)</b>: ' . $data["address"] . '</p>
	<p><b>Số Chứng minh thư / Thẻ căn cước</b>: ' . $data["cmnd"] . '</p>
	<p><b>Hình thức thanh toán</b>: ' . $data["thanh_toan"] . '</p>
	<p><b>Hình thức giao sim</b>: ' . $data["giao_sim"] . '</p>
	<p><b>Hình ảnh 1</b>: <img src="' . $data["path_1"] . '" width="100%" ></p>
	<p><b>Hình ảnh 2</b>: <img src="' . $data["path_2"] . '" width="100%" ></p>';

	return $content_mail;
}