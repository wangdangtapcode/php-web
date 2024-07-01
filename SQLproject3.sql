
CREATE TABLE comics (
  comic_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  author_name VARCHAR(100),
  title VARCHAR(100),
  genre VARCHAR(50),
  description TEXT,
  release_date VARCHAR(50),
  price FLOAT,
  cover_image_url VARCHAR(255),
  featured VARCHAR(50),
  status VARCHAR(50),
  isDelete ENUM('True', 'False') DEFAULT 'False'
);

INSERT INTO comics (author_name, title, genre, release_date, price, cover_image_url, status,featured)
VALUES ('Masashi Kishimoto', 'Naruto tap 1', 'Action', '27-11-2003', 100000, '/public/img/narutotap1.jpg', 'active','0'),
       ('Masashi Kishimoto', 'Naruto tap 2 ', 'Action', '27-11-2003', 100000, '/public/img/narutotap2.jpg', 'active','0'),
	   ('Masashi Kishimoto', 'Naruto tap 3', 'Action', '27-11-2003', 100000, '/public/img/narutotap3.jpg', 'active','0'),
	   ('Masashi Kishimoto', 'Naruto tap 4', 'Action', '27-11-2003', 100000, '/public/img/narutotap4.jpg', 'active','0'),
	   ('Masashi Kishimoto', 'Naruto tap 5', 'Action', '27-11-2003', 100000, '/public/img/narutotap5.jpg', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 1', 'Action', '27-11-2003', 150000, '/public/img/OPtap1.png', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 2', 'Action', '27-11-2003', 150000, '/public/img/OPtap2.png', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 3', 'Action', '27-11-2003', 150000, '/public/img/OPtap3.png', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 4', 'Action', '27-11-2003', 150000, '/public/img/OPtap4.jpg', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 5', 'Action', '27-11-2003', 150000, '/public/img/OPtap5.jpg', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 6', 'Action', '27-11-2003', 150000, '/public/img/OPtap6.png', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 7', 'Action', '27-11-2003', 150000, '/public/img/OPtap7.png', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 8', 'Action', '27-11-2003', 150000, '/public/img/OPtap8.png', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 9', 'Action', '27-11-2003', 150000, '/public/img/OPtap9.jpg', 'active','0'),
	   ('Eiichiro Oda', 'OnePiece tap 10', 'Action', '27-11-2003', 150000, '/public/img/OPtap10.png', 'active','0'),
	   ('Akira Toriyama', 'Dragonball tap 1', 'Action', '27-11-2003', 200000, '/public/img/Dragonballtap1.png', 'active','0'),
	   ('Akira Toriyama', 'Dragonball tap 2', 'Action', '27-11-2003', 200000, '/public/img/Dragonballtap2.png', 'active','0'),
	   ('Akira Toriyama', 'Dragonball tap 3', 'Action', '27-11-2003', 200000, '/public/img/Dragonballtap3.png', 'active','0'),
	   ('Akira Toriyama', 'Dragonball tap 4', 'Action', '27-11-2003', 200000, '/public/img/Dragonballtap4.png', 'active','0'),
	   ('Akira Toriyama', 'Dragonball tap 5', 'Action', '27-11-2003', 200000, '/public/img/Dragonballtap5.png', 'active','0');



CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
	description TEXT,
    permission JSON ,
    is_deleted ENUM('True', 'False') DEFAULT 'False'
);
INSERT INTO roles (title, description, permission) 
VALUES ('Quản lí', 'Đây là quyền của quản lý','["products-view", "products-create", "products-edit", "products-delete", "roles-view", "roles-permissions"]'),
		('Nhân viên', 'Đây là quyền của nhân viên','[]');

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
	role_id INT,
    token VARCHAR(10) UNIQUE,
    is_deleted ENUM('True', 'False') DEFAULT 'False',
	FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

DELIMITER //

CREATE TRIGGER generate_token BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    DECLARE token_value VARCHAR(10) DEFAULT '';

    SET token_value = SUBSTRING(MD5(RAND()), 1, 10);
    
    WHILE EXISTS (SELECT 1 FROM users WHERE token = token_value) DO
        SET token_value = SUBSTRING(MD5(RAND()), 1, 10);
    END WHILE;
    
    SET NEW.token = token_value;
END;

DELIMITER ;
INSERT INTO users (fullname, username, password,role_id) 
VALUES ('Quang', 'admin', '123',1),
		('Quangnv', 'nhanvien', '123',2);