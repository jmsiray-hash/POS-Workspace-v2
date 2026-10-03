CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    avatar VARCHAR(255) NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Juan Dela Cruz', 'juan@example.com', '09171234567', NOW()),
('Maria Clara', 'maria@example.com', '09182345678', NOW()),
('Crisostomo Ibarra', 'ibarra@example.com', '09193456789', NOW()),
('Andres Bonifacio', 'andres@example.com', '09204567890', NOW()),
('Gregoria De Jesus', 'gregoria@example.com', '09215678901', NOW());

INSERT INTO users (username, full_name, created_at) VALUES
('admin_juan', 'Juan Dela Cruz', NOW()),
('cashier_maria', 'Maria Clara', NOW()),
('manager_ibarra', 'Crisostomo Ibarra', NOW()),
('supervisor_andres', 'Andres Bonifacio', NOW()),
('staff_gregoria', 'Gregoria De Jesus', NOW());