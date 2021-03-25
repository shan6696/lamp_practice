<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'history.css'); ?>">

</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日</th>
            <th>合計金額</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orders as $order){ ?>
          <tr>
            <td><?php print $order['order_id']; ?></td>
            <td><?php print $order['createdate']; ?></td>
            <td><?php print $order['sum(order_details.price * order_details.amount)']; ?>円</td>
            <td>
              <!-- <form method="post" action="order_detail.php">
                <input type="hidden" name="order_id" value="<?php print $order['order_id']; ?>">
                <input type="hidden" name="token" value="<?php print $token; ?>">
                <input type="submit" value="購入明細表示">
              </form> -->
              <a href='../order_detail.php?token=<?php print $token; ?>&order_id=<?php print $order['order_id']; ?>'><button class="btn btn-Dark">購入明細表示</button></a>
            </td>
          <?php } ?>
        </tbody>
      </table>
  </div>
</body>
</html>