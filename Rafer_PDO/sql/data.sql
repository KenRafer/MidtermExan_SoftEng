CREATE TABLE instruments (
    instrument_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(100),
    brand VARCHAR(100),
    price DECIMAL(10, 2),
    description TEXT
);

CREATE TABLE features (
    feature_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    details TEXT,
    instrument_id INT,
    FOREIGN KEY (instrument_id) REFERENCES instruments(instrument_id) ON DELETE CASCADE
);

-- Create customers table
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create orders table
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    instrument_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    quantity INT NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id),
    FOREIGN KEY (instrument_id) REFERENCES instruments(instrument_id)
);


INSERT INTO instruments (name, type, brand, price, description) VALUES
('Acoustic Guitar', 'String', 'Yamaha', 299.99, 'A high-quality acoustic guitar for beginners.'),
('Electric Guitar', 'String', 'Fender', 699.99, 'Perfect for rock and blues enthusiasts.'),
('Digital Piano', 'Keyboard', 'Casio', 549.99, '88-key digital piano with weighted keys.'),
('Drum Set', 'Percussion', 'Pearl', 799.99, 'A 5-piece drum set suitable for all levels.'),
('Violin', 'String', 'Stradivarius', 1499.99, 'A beautifully crafted violin with rich sound.');

INSERT INTO features (name, details, instrument_id) VALUES
('Body Material', 'Mahogany wood', 1),
('String Type', 'Steel', 1),
('Pickups', 'Single-coil pickups', 2),
('Pedal Compatibility', 'Supports sustain pedal', 3),
('Cymbal Quality', 'High-quality brass cymbals', 4),
('Bow Quality', 'Brazilwood bow included', 5);
