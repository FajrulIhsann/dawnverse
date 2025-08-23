# ToDoList
Proyek ini merupakan proyek belajar saya untuk memahami bahasa php. Proyek ini merupakan proyek pertama php saya jadi pasti akan banyak kekurangan bahkan merupakan proyek yang sangat berantakan.

Di bawah ini adalah langkah langkah untuk menggunakan repository nya 

# Step Pertama
Clone repository ini ke server kalian
```
git clone https://github.com/FajrulIhsann/ToDoList
```
# Step Kedua

buat database terlebih dahulu
ketikkan query :
```
CREATE DATABASE "todolist_db"
```
Lalu di dalam database todolist_db ketik query :
```
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(20) NOT NULL UNIQUE,
  password VARCHAR(20) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    task TEXT NOT NULL,
    status ENUM('pending', 'done') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
# Step Ketiga
Setup service/database.php
```
$hostname = "yourhost";
$password = "yourpassword";
```
sesuaikan nama dan password database dengan milik kamu

