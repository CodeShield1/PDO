CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

INSERT INTO users (name) VALUES 
(1,'Ahmed'),
(2?'Mohammed'),
(3,'Fatima'),
(4,'Ali'),
(5,'Sara'),
(6,'Omar'),
(7,'Layla'),
(8,'Hassan'),
(9,'Mariam'),join
(10,'Youssef');


SELECT * FROM  users;




CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,                  
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO products (user_id, product_name, price) VALUES
(1, 'Laptop Dell', 5000.00),
(2, 'iPhone 15', 8000.00),
(3, 'Samsung TV', 4500.00),
(1, 'Headphones Sony', 800.00),
(4, 'Keyboard Mechanical', 450.00),
(5, 'Mouse Gaming', 350.00),
(2, 'Monitor 27 inch', 2500.00),
(6, 'Webcam HD', 600.00),
(3, 'USB-C Hub', 250.00),
(7, 'Laptop Stand', 300.00);



SELECT * FROM  products;


SELECT users.id, users.name, products.product_name
FROM users
INNER JOIN products
ON users.id = products.user_id
