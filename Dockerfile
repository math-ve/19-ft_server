# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: mvan-eyn <mvan-eyn@student.42.fr>          +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/10/22 15:43:56 by mvan-eyn          #+#    #+#              #
#    Updated: 2020/11/12 10:18:09 by mvan-eyn         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM debian:buster

LABEL maintainer = "Mathieu Van Eynde <mvan-eyn@student.s19.be>"

# Utils
RUN apt-get update -y \
	&& apt update -y \
	&& apt-get install curl -y \
	&& apt-get install wget -y \
	&& apt-get install sudo -y

# Nginx
RUN apt-get install nginx -y

# mySQL
RUN apt install mariadb-server mariadb-client -yq

# Php
RUN apt-get install php -yq \
	&& apt-get install php-mysql -yq \
	&& apt install php7.3 php7.3-fpm php7.3-mysql -yq\
	&& apt install  php-mbstring -yq

RUN rm /var/www/html/*.html

# Phpmyadmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.1/phpMyAdmin-5.0.1-all-languages.tar.gz
RUN	tar -zxzf phpMyAdmin-5.0.1-all-languages.tar.gz \
	&& mv phpMyAdmin-5.0.1-all-languages /var/www/html/phpMyAdmin \
	&& rm phpMyAdmin-5.0.1-all-languages.tar.gz \
	&& mkdir /var/www/html/phpMyAdmin/tmp \
	&& chmod 777 /var/www/html/phpMyAdmin/tmp

# install SSL
RUN mkdir ./mkcert
COPY /srcs/mkcert ./mkcert/
RUN chmod +x ./mkcert/mkcert && ./mkcert/mkcert -install && ./mkcert/mkcert localhost.com

# Wordpress
RUN cd /tmp \
	&& curl -LO https://wordpress.org/latest.tar.gz \
	&& tar xzvf latest.tar.gz \
	&& mkdir /var/www/html/wordpress \
	&& cp -a /tmp/wordpress/. /var/www/html/wordpress \
	&& chown -R www-data:www-data /var/www/
COPY srcs/wp-config.php /var/www/html/wordpress

# Config html
COPY /srcs/nginx.conf /etc/nginx/sites-available
COPY /srcs/config.inc.php /var/www/html/phpMyAdmin
RUN ln -s /etc/nginx/sites-available/nginx.conf /etc/nginx/sites-enabled/
RUN rm -rf /etc/nginx/sites-enabled/default

# Grant Access
RUN chown -R www-data /var/www/*
RUN chmod -R 755 /var/www/*

ENV autoindex=off

# Run services
RUN service nginx start
RUN service php7.3-fpm start
RUN service mysql start

EXPOSE 80 443

COPY srcs/directoryindex.sh ./
COPY srcs/index.html ./
RUN /bin/bash ./directoryindex.sh
COPY srcs/sql_init.sh ./

CMD /bin/bash ./sql_init.sh && sleep infinity & wait

