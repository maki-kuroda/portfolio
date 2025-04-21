--　収入の編集テーブル
CREATE TABLE income (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    amount INT 
);

-- 項目の挿入
INSERT INTO income VALUES(
    NULL,
    'メイン',
    NULL
);

INSERT INTO income VALUES(
    NULL,
    'サブ',
    NULL
);


-- 金額入力テーブル
-- CREATE TABLE amount(
--     id INT PRIMARY KEY AUTO_INCREMENT,
    
--     customer_id INT,
--     product_id INT,
--     PRIMARY KEY(customer_id, product_id),
--     FOREIGN KEY(customer_id) REFERENCES customer(id),
--     FOREIGN KEY (product_id) REFERENCES products(id)
-- )