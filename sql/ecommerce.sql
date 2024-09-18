CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description, price, image, stock) VALUES
('Product 1', 'Description for product 1', 19.99, 'product1.jpg', 50),
('Product 2', 'Description for product 2', 29.99, 'product2.jpg', 30),
('Product 3', 'Description for product 3', 39.99, 'product3.jpg', 20),
('Product 4', 'Description for product 4', 49.99, 'product4.jpg', 15),
('Product 5', 'Description for product 5', 59.99, 'product5.jpg', 10);
