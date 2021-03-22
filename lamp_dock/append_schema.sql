CREATE TABLE orders (
  order_id INT AUTO_INCREMENT,
  user_id INT,
  purchase INT,
  createdate DATETIME,
  primary key(order_id)
);

CREATE TABLE order_details (
  order_id INT,
  item_id INT,
  price INT,
  amount INT DEFAULT 0
);

SELECT
  order_details.order_id,
  items.name,
  order_details.price,
  order_details.amount
FROM
  order_details
  INNER JOIN items
  ON order_details.item_id = items.item_id;