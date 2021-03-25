<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

header('X-FRAME-OPTIONS: DENY');
session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);


if($_GET['value'] === 'new') {
  $items = get_items_created_desc($db);
} else if($_GET['value'] === 'row') {
  $items = get_items_price_asc($db);
} else if($_GET['value'] === 'high') {
  $items = get_items_price_desc($db);
} else {
  $items = get_open_items($db);
}
$items_ranking = get_ranking_item($db, $sql);



$token = get_csrf_token();

include_once VIEW_PATH . 'index_view.php';