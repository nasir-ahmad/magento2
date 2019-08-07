FROM nasirmail10/php:7.2-fpm

# install phpredis and memcached
RUN apt-get update \
  && apt-get install -y libmemcached-dev zlib1g-dev \
  && pecl install redis \
  && pecl install memcached \
  && docker-php-ext-enable redis \
  && docker-php-ext-enable memcached \
  && rm -rf /var/lib/apt/lists/* \
  && rm -rf /usr/share/php7 \
  && rm -rf /tmp/*

COPY docker/conf/www.conf /usr/local/etc/php-fpm.d/
COPY docker/conf/php.ini /usr/local/etc/php/
COPY docker/conf/opcache.ini /usr/local/etc/php/conf.d/
COPY docker/conf/php-fpm.conf /usr/local/etc/
COPY docker/bin/* /usr/local/bin/
RUN chmod +x /usr/local/bin/start

# Uncomment this to install the Blackfire agent
# install blackfire
#RUN version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
#  && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$version \
#  && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp \
#  && mv /tmp/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
#  && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > $PHP_INI_DIR/conf.d/blackfire.ini

WORKDIR /var/www/html
ADD . /var/www/html

# add custom env configuration
COPY docker/conf/env.php /var/www/html/app/etc/

# make misc dirs
RUN mkdir -p /var/www/html/var \
  && chmod -R 777 /var/www/html/var

# set perms
RUN cd /var/www/html \
  && find . -type d -exec chmod 770 {} \; \
  && find . -type f -exec chmod 660 {} \; \
  && chmod u+x bin/magento

# Expose volumes
VOLUME ["/var/www/html"]
VOLUME ["/var/www/html/pub/media"]

CMD ["/usr/local/bin/start"]
