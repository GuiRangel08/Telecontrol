CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    code VARCHAR(50),
    description VARCHAR(255) UNIQUE,
    warranty_period INT,
    status BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE INDEX IF NOT EXISTS idx_products_code ON products(code);