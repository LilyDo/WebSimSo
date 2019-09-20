<?php

function base_url(){
  return get_stylesheet_directory_uri();
}

function sendMail($var = array()){
  //0: name; 1: addresh; 2: subject; 3: content (PHP File)
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
  $phpMailer->Username = 'AKIAJXGJW2M4PY5MZCUQ';
  $phpMailer->Password = 'AuGtMD1TijoCL+XWWdaEqDMqhzT0jIti9eKR4f9gK4JK';
  $phpMailer->SMTPSecure = 'tls';
  $phpMailer->Port = 587;

  $phpMailer->setFrom('admin@vandecor.vn', $var[0]);

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
