<?php

function base_url()
{
    return get_stylesheet_directory_uri();
}

function sendMail($var = array())
{
    //0: name; 1: address; 2: subject; 3: content (PHP File)
    global $phpMailer;

// (Re)create it, if it's gone missing
    if (!($phpMailer instanceof phpMailer)) {
        require_once ABSPATH . WPINC . '/class-phpmailer.php';
        require_once ABSPATH . WPINC . '/class-smtp.php';
    }
    $phpMailer = new phpMailer;

// SMTP configuration
    $phpMailer->isSMTP();
    $phpMailer->Host = 'email-smtp.us-west-2.amazonaws.com';
    $phpMailer->SMTPAuth = true;
    $phpMailer->Username = 'AKIAVZCW7BGKEE6X27VV';
    $phpMailer->Password = 'BD2pBi7/+1E/DG1tlg4XbpAvkSbl+RWhlTDVrVoVvNSk';
    $phpMailer->SMTPSecure = 'tls';
    $phpMailer->Port = 587;

    $phpMailer->setFrom('admin@mobifonesaigon.com.vn', "Mobifone Sai Gon Admin");

// Add a recipient
    // dlctoanphat@gmail.com
    $phpMailer->addAddress('dlctoanphat@gmail.com');

// Add cc or bcc
//$phpMailer->addCC('cc@example.com');
//$phpMailer->addBCC('bcc@example.com');

// Set email format to HTML
    $phpMailer->isHTML(true);

// Email subject
    $phpMailer->Subject = $var[0];

// Email body content
    $mailContent = $var[1];
    $phpMailer->Body = $mailContent;

    if (!$phpMailer->send()) {
        return 'Message could not be sent.' . PHP_EOL . 'Mailer Error: ' . $phpMailer->ErrorInfo;
    } else {
        return 'Message has been sent';
    }
}

function serializeData($value = '')
{
    $data = explode(',', $value);
    if (is_array($data)) {
        $response = serialize($data);
    } else
        $response = $data;

    return $response;
}

function processPage($page, $dataGET = [])
{
    $response = '?';
    if ($dataGET) {
        $havePaging = 0;
        foreach ($dataGET as $key => $item) {
            if ($key == 'paging') {
                $response .= $key . '=' . $page . '&';
                $havePaging = 1;
            } else
                $response .= $key . '=' . $item . '&';
        }
        if (!$havePaging)
            $response .= 'paging=' . $page;
    } else
        $response .= 'paging=' . $page;

    return $response;
}

function processPostTerms($term_name, $post_id)
{
    $terms = wp_get_post_terms($post_id, $term_name, ['orderby' => 'term_id', 'order' => 'ASC']);
    $str = [];
    foreach ($terms as $value) {
        $str[] = $value->name;
    }

    return implode(', ', $str);
}

function processDataUrl($item, $name)
{
    if ($item) {
        list($type, $item) = explode(';', $item);
        list(, $item) = explode(',', $item);
        $item = base64_decode($item);

        $path = 'wp-content/uploads/images/' . 'image_' . $name . '_' . strtotime(date('Y-m-d H:i:s')) . '.png';

        file_put_contents(ABSPATH . $path, $item);

        return get_site_url() . '/' . $path;
    } else
        return '';
}
function testingNumberWithType($number, $id){
    $arrMatch = [];

    $terms = get_the_terms($id, 'types');
    if (!empty($terms)){
        foreach ($terms as $item){
            $arrMatch[] = $item->name;
        }
    }

    $reg1 = '/^.*39$/';
    $reg2 = '/^.*79$/';
    if (preg_match($reg1, $number) || preg_match($reg2, $number))
        $arrMatch[] = 'Thần tài';

    $reg1 = '/^.*38$/';
    $reg2 = '/^.*78$/';
    if (preg_match($reg1, $number) || preg_match($reg2, $number))
        $arrMatch[] = 'Ông địa';

    $reg1 = '/^.*68$/';
    $reg2 = '/^.*86$/';
    if (preg_match($reg1, $number) || preg_match($reg2, $number))
        $arrMatch[] = 'Lộc phát';

    for ($i = 0; $i <= 999; $i += 111){
        if ($i == 0)
            $reg = '/^.*000$/';
        else
            $reg = '/^.*' . $i . '$/';

        if (preg_match($reg, $number)){
            $arrMatch[] = 'Tam hoa cuối';
            break;
        }
    }

    for ($i = 123; $i <= 6789; $i += 1111){
        if ($i == 123)
            $reg = '/^.*0123.*$/';
        else
            $reg = '/^.*' . $i . '.*$/';

        if (preg_match($reg, $number)){
            $arrMatch[] = 'Tiến 4 giữa';
            break;
        }
    }

    if (count($arrMatch) == 0)
        $arrMatch[] = 'Số thường';

    return implode(', ', $arrMatch);
}

function makeDataQueryType($type){
    $args['relation'] = 'OR';
    $data = [];
    switch ($type){
        case 'thantai': $data = ['*39', '*79'];break;
        case 'ongdia': $data = ['*38', '*78'];break;
        case 'locphat': $data = ['*68', '*86'];break;
        case 'tamhoacuoi': {
            for($i = 0; $i <= 999; $i += 111){
                if ($i == 0)
                    $data[] = '*000' ;
                else
                    $data[] = '*' . $i;
            }
        };break;
        case 'tien4giua': {
            for ($i = 123; $i < 6789; $i += 1111){
                if ($i == 123)
                    $data[] = '*0123*';
                else
                    $data[] = '*' . $i . '*';
            }
        };break;
    }

    foreach ($data as $item){
        $item = '^' . str_replace('*', '.*', $item) . '$';
        $args[] = [
            'key' => 'number',
            'value' => $item,
            'compare' => 'REGEXP'
        ];
    }

    return $args;
}

function makeDataQueryCost($cost){
    $data = explode('_', $cost);
    if (count($data) == 1){
        $args = [
            'key' => 'cost',
            'value' => $data[0] * 1000000,
            'type'		=> 'NUMERIC',
            'compare' => '>='
        ];
    }
    else{
        $args[] = [
            'key' => 'cost',
            'value' => $data[0] * 1000000,
            'type'		=> 'NUMERIC',
            'compare' => '>='
        ];
        $args[] = [
            'key' => 'cost',
            'value' => $data[1] * 1000000,
            'type'		=> 'NUMERIC',
            'compare' => '<='
        ];
    }

    return $args;
}


function getList($type = 'loaiso', $id = 0){
    $arr = [];
    switch ($type){
        case 'loaiso': {
            $arr = [
                'thantai' => 'Thần tài',
                'ongdia' => 'Ông địa',
                'locphat' => 'Lộc phát',
                'tamhoacuoi' => 'Tam hoa cuối',
                'tien4giua' => 'Tiến 4 giữa'
            ];
        } break;
        case 'gia': {
            $arr = [
                '0_5' => 'Dưới 5 triệu',
                '5_20' => 'Từ 5 đến 20 triệu',
                '20_100' => 'Từ 20 đến 100 triệu',
                '100' => 'Trên 100 triệu',
            ];
        } break;
        case 'goicuoc': {
            $terms = wp_get_post_terms($id, 'types');
            $a = 0;
            foreach ($terms as $term){
                if (strpos($term->slug, 'cam-ket') !== false)
                    $a = 1;
            }
            if ($a == 1){
                $arr = [
                    'CK150' => 'CK150: 150,000 Vnđ/tháng. KH được hưởng ưu đãi của gói cam kết gồm: 700 phút nội mạng Mobifone, cố định VNPT toàn quốc.',
                    'CK250' => 'CK250: 250,000 Vnđ/tháng. KH được hưởng ưu đãi của gói cam kết gồm: 700 phút nội mạng Mobifone, cố định VNPT toàn quốc. Được miễn phí 1 gói M50(450MB tốc độ cao/chu kỳ), vượt dung lượng sẽ tính cước phát sinh 25đ/50kB.',
                ];
            }
            else{
                $arr = [
                    'M69' => 'M69: (69.000đ/tháng – 1000 phút nội mạng)',
                    'MF99' => 'MF99: (99.000đ/tháng – miễn cước thuê bao tháng; 1000 phút nội mạng; 40 phút ngoại mạng, 5GB tốc độ cao)',
                    'MF149' => 'MF149: (149.000đ/tháng – miễn cước thuê bao tháng; 1500 phút nội mạng; 80 phút ngoại mạng, 8GB tốc độ cao)',
                    'MF199' => 'MF199: (199.000đ/tháng – miễn cước thuê bao tháng; 1500 phút nội mạng; 160 phút ngoại mạng, 9GB tốc độ cao)',
                    'MF299' => 'MF299: (299.000đ/tháng – miễn cước thuê bao tháng; 2000 phút nội mạng; 300 phút ngoại mạng, 12GB tốc độ cao)',
                    'MF399' => 'MF399: (399.000đ/tháng – miễn cước thuê bao tháng; 3000 phút nội mạng; 400 phút ngoại mạng, 17GB tốc độ cao)',
                ];
            }

        } break;
    }


    return $arr;
}

require_once 'init/mail.php';

add_action('wp_ajax_buySim', 'buySim');
add_action('wp_ajax_nopriv_buySim', 'buySim');
function buySim()
{
    $data['sim'] = $_POST['sim_number'];
    $data['name'] = $_POST['name'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];
    $data['cmnd'] = $_POST['cmnd'];
    $data['thanh_toan'] = $_POST['thanh_toan'];
    $data['giao_sim'] = $_POST['giao_sim'];
    $data['address_delivery'] = $_POST['address_delivery'];
    $data['photo_1'] = $_POST['photo_1'];
    $data['photo_2'] = $_POST['photo_2'];
    $data['photo_3'] = $_POST['photo_3'];
    $data['photo_4'] = $_POST['photo_4'];
    $data['photo_5'] = $_POST['photo_5'];
    $data['photo_6'] = $_POST['photo_6'];
    $data['photo_7'] = $_POST['photo_7'];
    $data['photo_8'] = $_POST['photo_8'];
    $data['package'] = $_POST['package'];

    $data['thanh_toan'] = ($data['thanh_toan'] == "cod") ? "Thanh toán khi nhận sim (COD) Phí ship từ 15 - 25k tùy địa điểm giao sim." : "Thanh toán chuyển khoản (Internet banking) Miễn phí ship và phí chuyển khoản.";

    $data['giao_sim'] = ($data['giao_sim'] == 'store') ? "Khách hàng đến trực tiếp cty lấy sim tại: 249 Minh Phụng, phường 2, Quận 11, TP.HCM." : "Giao tận nơi tại " . $data['address_delivery'];

    for ($i = 1; $i <= 8; $i++){
        $data['path_' . $i] = '';
        if ($data['photo_' . $i])
            $data['path_' . $i] = processDataUrl($data['photo_' . $i], 'photo_' . $i);
    }

    $template_mail = mail_buy($data);
    //0: name; 1: address; 2: subject; 3: content (PHP File)
    $result = sendMail([ 'Customer Buying Sim', $template_mail]);
    wp_send_json_success($result);

    die();
}

add_action('wp_ajax_recharge', 'recharge');
add_action('wp_ajax_nopriv_recharge', 'recharge');
function recharge(){
    $data['network'] = $_POST['network'];
    $data['amount']  = $_POST['amount'];
    $data['phone']   = $_POST['phone'];
    $data['payment'] = $_POST['paymentPlan'];

    $data['payment'] = ($data['payment'] == 'pre')? "Trả Trước" : "Trả Sau";

    $template_mail = mail_recharge($data);
    $result = sendMail(['Customer Recharge', $template_mail]);

    wp_send_json_success($result);

    die();
}

//Ajax demo
add_action('wp_ajax_getDistrict', 'getDistrictWithProvince');
add_action('wp_ajax_nopriv_getDistrict', 'getDistrictWithProvince');
function getDistrictWithProvince()
{

    // $_POST['pro']

    // wp_send_json_success($rs);

    // die();//bắt buộc phải có khi kết thúc
}

require_once "init/sim.php";
require_once "init/banner.php";
