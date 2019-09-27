<?php

function base_url(){
  return get_stylesheet_directory_uri();
}

function sendMail($var = array()){
  //0: name; 1: address; 2: subject; 3: content (PHP File)
  global $phpMailer;

// (Re)create it, if it's gone missing
  if ( ! ( $phpMailer instanceof phpMailer ) ) {
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

  $phpMailer->setFrom('admin@mobifonesaigon.com.vn', $var[0]);

// Add a recipient
  $phpMailer->addAddress($var[1]);

// Add cc or bcc
//$phpMailer->addCC('cc@example.com');
//$phpMailer->addBCC('bcc@example.com');

// Set email format to HTML
  $phpMailer->isHTML(true);

// Email subject
  $phpMailer->Subject = $var[2];

// Email body content
  $mailContent = $var[3];
  $phpMailer->Body    = $mailContent;

  if(!$phpMailer->send()){
    return 'Message could not be sent.' . PHP_EOL . 'Mailer Error: ' . $phpMailer->ErrorInfo;
  }else{
    return 'Message has been sent';
  }
}

function serializeData($value=[])
{
  $data = explode(',', $value);
  $response = '';
  if (is_array($data)) {
    $response = serialize($data);
  }
  else
    $response = $data;

  return $response;
}

function processPage($page, $dataGET = []){
    $response = '?';
    if ($dataGET){
        $havePaging = 0;
        foreach ($dataGET as $key => $item) {
            if ($key == 'paging'){
                $response .= $key . '=' . $page . '&';
                $havePaging = 1;
            }
            else
                $response .= $key . '=' . $item . '&';
        }
        if (!$havePaging)
            $response .= 'paging=' . $page;
    }
    else
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

function processDataUrl($item)
{
    if ($item) {
        list($type, $item) = explode(';', $item);
        list(, $item) = explode(',', $item);
        $item = base64_decode($item);

        $path = ABSPATH . 'wp-content/uploads/images/' . 'image_' . strtotime(date('Y-m-d H:i:s')) . '.png';

        file_put_contents($path, $item);

        return $path;
    } else
        return '';

}

require_once 'init/mail.php';

add_action( 'wp_ajax_buySim', 'buySim' );
add_action( 'wp_ajax_nopriv_buySim', 'buySim' );
function buySim()
{
  $data['name']             = $_POST['name'];
  $data['phone']            = $_POST['phone'];
  $data['address']          = $_POST['address'];
  $data['cmnd']             = $_POST['cmnd'];
  $data['thanh_toan']       = $_POST['thanh_toan'];
  $data['giao_sim']         = $_POST['giao_sim'];
  $data['address_delivery'] = $_POST['address_delivery'];
  $data['photo_1']          = $_POST['photo_1'];
  $data['photo_2']          = $_POST['photo_2'];
  $data['sim']              = $_POST['sim_number'];

  $data['thanh_toan'] = ($data['thanh_toan'] == "cod")? "Thanh toán khi nhận sim (COD) Phí ship từ 15 - 25k tùy địa điểm giao sim." : "Thanh toán chuyển khoản (Internet banking) Miễn phí ship và phí chuyển khoản.";

  $data['giao_sim'] = ($data['giao_sim'] == 'store')? "Khách hàng đến trực tiếp cty lấy sim tại: 249 Minh Phụng, phường 2, Quận 11, TP.HCM." : "Giao tận nơi tại " . $data['address_delivery'];

  $data['path_1'] = ''; $data['path_2'] = '';
  if ($photo_1) {
    $data['path_1'] = processDataUrl($photo_1);
  }
  if ($path_2) {
    $data['path_2'] = processDataUrl($path_2);
  }

  $template_mail = mail_buy($data);
  // dlctoanphat@gmail.com
  //0: name; 1: address; 2: subject; 3: content (PHP File)
  $result = sendMail(['Mobifonesaigon Admin', 'dlctoanphat@gmail.com', 'Customer Buying Sim', $template_mail]);
  wp_send_json_success($result);

  die();

}


//Ajax demo
add_action( 'wp_ajax_getDistrict', 'getDistrictWithProvince' );
add_action( 'wp_ajax_nopriv_getDistrict', 'getDistrictWithProvince' );
function getDistrictWithProvince() {
	
	// $_POST['pro']

	// wp_send_json_success($rs);

	// die();//bắt buộc phải có khi kết thúc
}

require_once "init/sim.php";
require_once "init/banner.php";
