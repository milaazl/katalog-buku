-- Katalog Buku - ekspor database
CREATE DATABASE IF NOT EXISTS katalog_buku CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE katalog_buku;

DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE books (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  author VARCHAR(150) NOT NULL,
  publisher VARCHAR(150) NOT NULL,
  year SMALLINT NOT NULL,
  isbn VARCHAR(13) NOT NULL UNIQUE,
  category VARCHAR(150) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Akun: admin / admin123
INSERT INTO users (username, password) VALUES ('admin', '$2y$12$5G7b5ngDyad4X0/mHn2sO.I839EHVAoc6PZn60D4QMWmLnrSh1TEy');

INSERT INTO books (title, author, publisher, year, isbn, category) VALUES
('Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, '9789793062792', 'Novel'),
('Bumi Manusia', 'Pramoedya Ananta Toer', 'Hasta Mitra', 1980, '9789799731234', 'Sastra'),
('Clean Code', 'Robert C. Martin', 'Prentice Hall', 2008, '9780132350884', 'Programming');
