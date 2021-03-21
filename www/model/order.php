<?php

function insert_order($db, $user_id, $purchase) {

  $sql = 'INSERT INTO orders (user_id, purchase) VALUES (?,?)';
  
  return execute_query($db, $sql, array($user_id, $purchase));
}

function insert_order_details($db, $order_id, $carts) {
  $order_id = intval($db->lastInsertId());
  foreach($carts as $cart) {
    $item_id = $cart['item_id'];
    $amount = $cart['amount'];
    $price = $cart['price'];
    $sql = 'INSERT INTO order_details (order_id, item_id, price, amount) VALUES (?,?,?,?)';
    execute_query($db, $sql, array($order_id, $item_id, $price, $amount));
  }
}

function regist_order($db, $user_id, $purchase, $carts) {
  $db->beginTransaction();
  try{
    insert_order($db, $user_id, $purchase);
    insert_order_details($db, $order_id, $carts);
    $db->commit();
  } catch (PDOException $e) {
    $db->rollback();
    throw $e;
  }
}

?>