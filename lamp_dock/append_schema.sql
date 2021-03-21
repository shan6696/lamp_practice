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