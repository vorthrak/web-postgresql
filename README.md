# web-postgresql
## instalation in server 
- ```sudo apt update && upgarde -y```
- ```sudo apt install apache2 php libapache2-mod-php php-pgsql postgresql-client -y```
- ```sudo systemctl enable apache2```
- ```sudo systemctl start apache2```
- ```psql -h <endpoint database> -U <username>```
- ```cd /var/www/html/<taruh file>```
- ```sudo systemctl restart apache2```
---
## create database
```sql
CREATE DATABASE <nama database>;
\c <nama database>;
CREATE TABLE <nama table> (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);
\dt
\q
```
---
