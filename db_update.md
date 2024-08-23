ALTER TABLE categories CHANGE COLUMN short_code code VARCHAR(50) NOT NULL;
ALTER TABLE products CHANGE COLUMN short_code code VARCHAR(50) NOT NULL;

UPDATE categories
SET code = REPLACE(code, '_', '-')
WHERE code LIKE '%_%';

UPDATE products
SET code = REPLACE(code, '_', '-')
WHERE code LIKE '%_%';

