<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>ご購入ありがとうございました！</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'history.css'); ?>">

</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php print $order['order_id']; ?></td>
            <td><?php print $order['createdate']; ?></td>
            <td><?php print $order['purchase']; ?>円</td>

        </tbody>
      </table>

      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入時の商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($order_details as $detail){ 
            $sub_total = $detail['price'] * $detail['amount'];
          ?>
          <tr>
            <td><?php print $detail['name']; ?></td>
            <td><?php print $detail['price']; ?></td>
            <td><?php print $detail['amount']; ?></td>
            <td><?php print $sub_total; ?></td>
          <?php } ?>
        </tbody>
      </table>
      <a href="history.php">購入履歴に戻る</a>
  </div>
</body>
</html>