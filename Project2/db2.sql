CREATE USER 'server1'@'localhost' IDENTIFIED BY 'server123';
GRANT ALL PRIVILEGES ON * . * TO 'server1'@'localhost';
FLUSH PRIVILEGES;
CREATE DATABASE project2;
USE project2;
CREATE TABLE users(

   username VARCHAR(200),
   pass VARCHAR(100) ,
   email VARCHAR(200),
   created_at TIMESTAMP,
   PRIMARY KEY (username)
);


$conn = mysqli_connect('localhost', 'server', 'server123', 'users');