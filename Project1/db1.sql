CREATE USER 'server1'@'localhost' IDENTIFIED BY 'server123';
GRANT ALL PRIVILEGES ON * . * TO 'server1'@'localhost';
FLUSH PRIVILEGES;
CREATE DATABASE project1;
USE project1;
CREATE TABLE comments(
id INT AUTO_INCREMENT,
   full_name VARCHAR(200),
   comment TEXT ,
   approval TINYINT(1),
   created_at TIMESTAMP,
   PRIMARY KEY (id)
);


$conn = mysqli_connect('localhost', 'server', 'server123', 'comments');