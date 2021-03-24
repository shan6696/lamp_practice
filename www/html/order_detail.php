<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'order.php';

header('X-FRAME-OPTIONS: DENY');
session_start();
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$user = get_login_user($db);

if(is_valid_csrf_token($_POST['token'])) {
  $order_id = $_POST['order_id'];
}
get_csrf_token();
$order = get_order($db, $order_id);

$order_details = get_order_details($db, $order_id);



include_once '../view/order_detail_view.php';