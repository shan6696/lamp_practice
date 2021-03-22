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

function get_user_order($db, $user_id) {
  $sql = 'SELECT order_id, purchase, createdate FROM orders WHERE user_id = ? ORDER BY order_id DESC';
  return fetch_all_query($db, $sql, array($user_id));
}

function get_admin_order($db) {
  $sql = 'SELECT order_id, purchase, createdate FROM orders ORDER BY order_id DESC';
  return fetch_all_query($db, $sql);
}

function get_order($db, $order_id) {
  $sql = 'SELECT order_id, purchase, createdate FROM orders WHERE order_id = ?';
  return fetch_query($db, $sql, array($order_id));
}

function get_order_details($db, $order_id) {
  $sql = 'SELECT
          order_details.order_id,
          items.name,
          order_details.price,
          order_details.amount
        FROM
          order_details
          INNER JOIN items
          ON order_details.item_id = items.item_id
          WHERE order_id = ?';

  return fetch_all_query($db, $sql, array($order_id));
}

?>