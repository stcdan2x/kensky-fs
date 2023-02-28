## Zenzky Auctions

#### Full Stack App

Laravel 10, Vue 3, Inertia, Tailwind, MySQL

# Setups

# Laravel Valet Setup (Mac)

This will get you setup with Laravel & Valet on your Mac. **Quentin Watt** has a good video tutorial on getting setup [here](https://www.youtube.com/watch?v=sbv61xK_vD8) as well

## Install Homebrew

Go to [https://brew.sh/](https://brew.sh/) and copy the command and run in your terminal

It will be something like this...

```
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

Then update

```
brew update
```

## Install PHP

```
brew install php
```

## Install composer (PHP Dependency Manager)

```
brew install composer
```

## Put Composer in your $PATH

Run the following and see if it says "composer" anywhere

```
echo $PATH
```

If not, you have to add it to your path

Open your .zshrc (This command will open it with VS Code but you can open with any text editor)

```
code ~/.zshrc
```

## Add this line and save

```
export PATH=$PATH:$HOME/.composer/vendor/bin
```

- NOTE: If you are using bash instead of zsh, you need to edit ~/bashrc instead of ~/zshrc

- Restart your terminal and run this again and you should see "composer"

```
echo $PATH
```

## Install Valet with Composer

```
composer global require laravel/valet
```

## Run valet install

```
valet install
```

## Install Laravel Installer

```
composer global require laravel/installer
```

## Create a Laravel Project

Make sure you go to where you want to create your project folder

```
laravel new PROJECT_NAME
```

## Tell Valet to use the current folder for Laravel projects

```
valet park
```

## Open your project

Go to your browser and type http://PROJECT_FOLDER.test

## To see all parked projects

```
valet parked
```

## To rename your TLD from .test to something else, such as .dev

```
valet tld dev
```

# Laravel Xampp Setup (Windows & Mac)

## Install Xampp

Install Xampp from https://www.apachefriends.org/index.html

- Run the Xampp installer and open the Xampp control panel
- Make sure that you enable the Apache and MySQL services
- On mac you need to click "Start" on the Home tab, "Enable" on the Network tab and "Mount" on the Location Tab. Click "Explore" on the location tab to open your Xampp/Lampp folder

## Install Composer

Go to https://getcomposer.org/download

- On Windows, download and run the installer
- On Mac, copy the php commands and run in the terminal. Then copy the mv command and run in terminal. You can also install composer with Homebrew

## Create a New Laravel Project With Composer

Open a terminal in the htdocs folder. htdocs is where all of your local projects go.

htdocs folder location:

- **Windows** - C:\Xampp\htdocs
- **Mac** - /opt/lampp/htdocs

```
composer create-project --prefer-dist laravel/laravel PROJECT_NAME
```

## Virtual Host Setup

We now need to create a virtual host for our project

## Edit Hosts File

- **Windows** - C:/Windows/System32/drivers/etc/hosts
- **Mac** - /etc/hosts

Add these lines

```
127.0.0.1	localhost
127.0.0.1	PROJECT_NAME.test

```

## Edit Virtual Hosts File

- **Windows** - C:/xampp/apache/conf/extra/httpd-vhosts.conf

```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/PROJECT_NAME/public"
    ServerName PROJECT_NAME.test
 </VirtualHost>
```

- **Mac** - /opt/lampp/etc/extra/httpd-vhosts.conf

```
<VirtualHost *:80>
    DocumentRoot /opt/lampp/htdocs
    ServerName localhost
    ServerAlias www.localhost
</VirtualHost>


<VirtualHost *:80>
    DocumentRoot /opt/lampp/htdocs/PROJECT_NAME/public
    ServerName PROJECT_NAME.test
    ServerAlias www.PROJECT_NAME.test
</VirtualHost>
```

### Restart Apache with the Xampp panel

Now visit http://laravel.test ot htttp://laravel.test:8080 on Mac

## If it does not work, make sure virtual hosts file is enabled in httpd.conf

- **Windows** - C:/xampp/apache/conf/httpd.conf
- **Mac** - /opt/lampp/etc/httpd.conf

Remove the # from the beginning of this line

```
#Include etc/extra/httpd-vhosts.conf
```

Save the file

# MySQL Cheat Sheet

> Help with SQL commands to interact with a MySQL database

## MySQL Locations

- Mac _/usr/local/mysql/bin_
- Windows _/Program Files/MySQL/MySQL *version*/bin_
- Xampp _/xampp/mysql/bin_

## Add mysql to your PATH

```bash
# Current Session
export PATH=${PATH}:/usr/local/mysql/bin
# Permanantly
echo 'export PATH="/usr/local/mysql/bin:$PATH"' >> ~/.bash_profile
```

On Windows - https://www.qualitestgroup.com/resources/knowledge-center/how-to-guide/add-mysql-path-windows/

## Login

```bash
mysql -u root -p
```

## Show Users

```sql
SELECT User, Host FROM mysql.user;
```

## Create User

```sql
CREATE USER 'someuser'@'localhost' IDENTIFIED BY 'somepassword';
```

## Grant All Priveleges On All Databases

```sql
GRANT ALL PRIVILEGES ON * . * TO 'someuser'@'localhost';
FLUSH PRIVILEGES;
```

## Show Grants

```sql
SHOW GRANTS FOR 'someuser'@'localhost';
```

## Remove Grants

```sql
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'someuser'@'localhost';
```

## Delete User

```sql
DROP USER 'someuser'@'localhost';
```

## Exit

```sql
exit;
```

## Show Databases

```sql
SHOW DATABASES
```

## Create Database

```sql
CREATE DATABASE acme;
```

## Delete Database

```sql
DROP DATABASE acme;
```

## Select Database

```sql
USE acme;
```

## Create Table

```sql
CREATE TABLE users(
id INT AUTO_INCREMENT,
   first_name VARCHAR(100),
   last_name VARCHAR(100),
   email VARCHAR(50),
   password VARCHAR(20),
   location VARCHAR(100),
   dept VARCHAR(100),
   is_admin TINYINT(1),
   register_date DATETIME,
   PRIMARY KEY(id)
);
```

## Delete / Drop Table

```sql
DROP TABLE tablename;
```

## Show Tables

```sql
SHOW TABLES;
```

## Insert Row / Record

```sql
INSERT INTO users (first_name, last_name, email, password, location, dept, is_admin, register_date) values ('Brad', 'Traversy', 'brad@gmail.com', '123456','Massachusetts', 'development', 1, now());
```

## Insert Multiple Rows

```sql
INSERT INTO users (first_name, last_name, email, password, location, dept,  is_admin, register_date) values ('Fred', 'Smith', 'fred@gmail.com', '123456', 'New York', 'design', 0, now()), ('Sara', 'Watson', 'sara@gmail.com', '123456', 'New York', 'design', 0, now()),('Will', 'Jackson', 'will@yahoo.com', '123456', 'Rhode Island', 'development', 1, now()),('Paula', 'Johnson', 'paula@yahoo.com', '123456', 'Massachusetts', 'sales', 0, now()),('Tom', 'Spears', 'tom@yahoo.com', '123456', 'Massachusetts', 'sales', 0, now());
```

## Select

```sql
SELECT * FROM users;
SELECT first_name, last_name FROM users;
```

## Where Clause

```sql
SELECT * FROM users WHERE location='Massachusetts';
SELECT * FROM users WHERE location='Massachusetts' AND dept='sales';
SELECT * FROM users WHERE is_admin = 1;
SELECT * FROM users WHERE is_admin > 0;
```

## Delete Row

```sql
DELETE FROM users WHERE id = 6;
```

## Update Row

```sql
UPDATE users SET email = 'freddy@gmail.com' WHERE id = 2;

```

## Add New Column

```sql
ALTER TABLE users ADD age VARCHAR(3);
```

## Modify Column

```sql
ALTER TABLE users MODIFY COLUMN age INT(3);
```

## Order By (Sort)

```sql
SELECT * FROM users ORDER BY last_name ASC;
SELECT * FROM users ORDER BY last_name DESC;
```

## Concatenate Columns

```sql
SELECT CONCAT(first_name, ' ', last_name) AS 'Name', dept FROM users;

```

## Select Distinct Rows

```sql
SELECT DISTINCT location FROM users;

```

## Between (Select Range)

```sql
SELECT * FROM users WHERE age BETWEEN 20 AND 25;
```

## Like (Searching)

```sql
SELECT * FROM users WHERE dept LIKE 'd%';
SELECT * FROM users WHERE dept LIKE 'dev%';
SELECT * FROM users WHERE dept LIKE '%t';
SELECT * FROM users WHERE dept LIKE '%e%';
```

## Not Like

```sql
SELECT * FROM users WHERE dept NOT LIKE 'd%';
```

## IN

```sql
SELECT * FROM users WHERE dept IN ('design', 'sales');
```

## Create & Remove Index

```sql
CREATE INDEX LIndex On users(location);
DROP INDEX LIndex ON users;
```

## New Table With Foreign Key (Posts)

```sql
CREATE TABLE posts(
id INT AUTO_INCREMENT,
   user_id INT,
   title VARCHAR(100),
   body TEXT,
   publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id),
   FOREIGN KEY (user_id) REFERENCES users(id)
);
```

## Add Data to Posts Table

```sql
INSERT INTO posts(user_id, title, body) VALUES (1, 'Post One', 'This is post one'),(3, 'Post Two', 'This is post two'),(1, 'Post Three', 'This is post three'),(2, 'Post Four', 'This is post four'),(5, 'Post Five', 'This is post five'),(4, 'Post Six', 'This is post six'),(2, 'Post Seven', 'This is post seven'),(1, 'Post Eight', 'This is post eight'),(3, 'Post Nine', 'This is post none'),(4, 'Post Ten', 'This is post ten');
```

## INNER JOIN

```sql
SELECT
  users.first_name,
  users.last_name,
  posts.title,
  posts.publish_date
FROM users
INNER JOIN posts
ON users.id = posts.user_id
ORDER BY posts.title;
```

## New Table With 2 Foriegn Keys

```sql
CREATE TABLE comments(
	id INT AUTO_INCREMENT,
    post_id INT,
    user_id INT,
    body TEXT,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) references users(id),
    FOREIGN KEY(post_id) references posts(id)
);
```

## Add Data to Comments Table

```sql
INSERT INTO comments(post_id, user_id, body) VALUES (1, 3, 'This is comment one'),(2, 1, 'This is comment two'),(5, 3, 'This is comment three'),(2, 4, 'This is comment four'),(1, 2, 'This is comment five'),(3, 1, 'This is comment six'),(3, 2, 'This is comment six'),(5, 4, 'This is comment seven'),(2, 3, 'This is comment seven');
```

## Left Join

```sql
SELECT
comments.body,
posts.title
FROM comments
LEFT JOIN posts ON posts.id = comments.post_id
ORDER BY posts.title;

```

## Join Multiple Tables

```sql
SELECT
comments.body,
posts.title,
users.first_name,
users.last_name
FROM comments
INNER JOIN posts on posts.id = comments.post_id
INNER JOIN users on users.id = comments.user_id
ORDER BY posts.title;

```

## Aggregate Functions

```sql
SELECT COUNT(id) FROM users;
SELECT MAX(age) FROM users;
SELECT MIN(age) FROM users;
SELECT SUM(age) FROM users;
SELECT UCASE(first_name), LCASE(last_name) FROM users;

```

## Group By

```sql
SELECT age, COUNT(age) FROM users GROUP BY age;
SELECT age, COUNT(age) FROM users WHERE age > 20 GROUP BY age;
SELECT age, COUNT(age) FROM users GROUP BY age HAVING count(age) >=2;

```
