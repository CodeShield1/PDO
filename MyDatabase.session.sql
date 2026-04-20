-- ======================================================
-- DATABASE SCHEMA & SAMPLE DATA
-- ======================================================

-- 1. Database for Products (prototype_2)
-- CREATE DATABASE IF NOT EXISTS `products`;
-- USE `products`;

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `quantity` INT NOT NULL
);

INSERT INTO `products` (`name`, `price`, `quantity`) VALUES
('Laptop Dell XPS 15', 1299.99, 45),
('iPhone 15 Pro', 999.00, 120),
('Samsung Galaxy S24', 849.99, 87),
('Sony WH-1000XM5 Headphones', 349.99, 200),
('iPad Air 11"', 599.00, 65),
('Logitech MX Master 3 Mouse', 99.99, 310),
('Mechanical Keyboard Keychron K8', 89.99, 150),
('4K Monitor LG 27"', 499.99, 40),
('External SSD Samsung T7 1TB', 109.99, 230),
('Webcam Logitech C920', 79.99, 175);

-- 2. Database for Recipes (realisation & realisation_2)
-- CREATE DATABASE IF NOT EXISTS `recipes-v2`;
-- USE `recipes-v2`;

CREATE TABLE IF NOT EXISTS `categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
);

INSERT INTO `categories` (`name`) VALUES 
('Entree'), 
('Plat'), 
('Dessert');

CREATE TABLE IF NOT EXISTS `recipes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `category_id` INT,
    `category` VARCHAR(50), -- Used in realisation/index.php
    `prep_time` INT NOT NULL,
    `image` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE SET NULL
);

INSERT INTO `recipes` (`name`, `category_id`, `category`, `prep_time`, `image`) VALUES
('Tajine de Poulet', 2, 'Plat', 60, 'images/tajine.jpg'),
('Salade César', 1, 'Entree', 15, 'images/salade.jpg'),
('Tarte au Citron', 3, 'Dessert', 45, 'images/cake.jpg'),
('Sushi Moriawase', 2, 'Plat', 90, 'images/sushi.jpg'),
('Pancakes Myrtilles', 3, 'Dessert', 20, 'images/pancakes.jpg');
