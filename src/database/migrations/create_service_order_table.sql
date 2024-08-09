CREATE TABLE IF NOT EXISTS service_order (
    id SERIAL PRIMARY KEY,
    number VARCHAR(50) UNIQUE,
    opening_date DATE,
    consumer_name VARCHAR(255) NOT NULL,
    consumer_cpf VARCHAR(14) NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id),
    status BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE INDEX IF NOT EXISTS idx_service_order_number ON service_order(number);