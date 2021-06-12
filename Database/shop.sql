SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";

CREATE TABLE cart(
    cart_id INT(11) NOT NULL AUTO_INCREMENT,
    _user_id INT(11) NOT NULL,
    item_id INT(11) NOT NULL, 
    PRIMARY KEY (cart_id)  
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;


CREATE TABLE product(
    item_id INT(11) NOT NULL AUTO_INCREMENT,
    item_brand VARCHAR(200) NOT NULL,
    item_name VARCHAR(255) NOT NULL,
    item_price DOUBLE(10,2) NOT NULL,
    item_image VARCHAR(255) NOT NULL,
    item_type VARCHAR(255) NOT NULL,
    item_register DATETIME,   
    PRIMARY KEY(item_id)        
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO product (item_brand, item_name, item_price, item_image) VALUES
('Adidas', 'Red T-shirt', '50.00','./images/product-1.jpg'),
('Nike', 'Sneaker 1', '60.00','./images/product-2.jpg'),
('Adidas', 'Jeans 1', '40.00','./images/product-3.jpg'),
('Adidas', 'Blue T-shirt', '50.00','./images/product-4.jpg'),
('Nike', 'Sneaker 2', '60.00','./images/product-5.jpg'),
('Adidas', 'Black T-shirt', '50.00','./images/product-6.jpg'),
('HRX', 'Socks', '5.00','./images/product-7.jpg'),
('Rolex', 'Watch 1', '100.00','./images/product-8.jpg'),
('Rolex', 'Watch 2', '99.00','./images/product-9.jpg'),
('Nike', 'Sneaker 3', '50.00','./images/product-10.jpg'),
('Nike', 'Sneaker 4', '60.00','./images/product-11.jpg'),
('Adidas', 'Jeans 2', '30.00','./images/product-12.jpg');


CREATE TABLE users (
  _user_id INT(11) NOT NULL AUTO_INCREMENT,
  _user_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  _password VARCHAR(255) NOT NULL,  
  PRIMARY KEY (_user_id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO users (_user_name, email, _password) VALUES
('HuyQuang', 'nguyenhuyquang306@gmail.com', '123456');


CREATE TABLE wishlist (
  cart_id int(11) NOT NULL,
  _user_id int(11) NOT NULL,
  item_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;