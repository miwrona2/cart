CREATE TABLE cart
(
  id MEDIUMINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
);

CREATE TABLE cart_item
(
  id MEDIUMINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  cart_id MEDIUMINT UNSIGNED NOT NULL,
  product_id MEDIUMINT UNSIGNED NOT NULL
);

CREATE TABLE product
(
  id MEDIUMINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  price DECIMAL(9,2) NOT NULL,
  cart_id MEDIUMINT UNSIGNED NULL
);

INSERT INTO product(title, price)
    VALUES
      ('Fallout', 1.99),
      ('Don\'t Starve', 2.99),
      ('Baldur\'s Gate', 3.99),
      ('Icewind Dale', 4.99),
      ('Bloodborne', 5.99);