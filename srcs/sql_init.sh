service mysql restart
mysql -u root -e "CREATE DATABASE wordpress;"
mysql -u root -e "CREATE USER 'mvan-eyn'@'localhost' IDENTIFIED BY 'mvan-eyn6666@';"
mysql -u root -e "GRANT ALL PRIVILEGES ON wordpress.* TO 'mvan-eyn'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"
service nginx start && service php7.3-fpm start && service mysql restart