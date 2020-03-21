FROM php:7.3-fpm-alpine

RUN apk update

RUN apk add \
    tzdata \
    $PHPIZE_DEPS \
    libpng-dev \
    curl \
    curl-dev \
    libxml2-dev \
    git \
    mysql-client \
    wget \
    nodejs \
    nodejs-npm \
    bash \
    libzip-dev

RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir \
    --with-png-dir \
    --with-jpeg-dir \
  && NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
  && docker-php-ext-install -j${NPROC} gd \
  && apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev
  
RUN docker-php-ext-install \
    curl \
    mbstring \
    xml \
    simplexml \
    zip \
    mysqli pdo_mysql 

RUN docker-php-source extract
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Compile Phalcon
RUN cd ~ && git clone --depth=1 -b 3.4.x git://github.com/phalcon/cphalcon.git && \
    cd ~/cphalcon/build && \
    ./install && \
    echo "extension=phalcon.so" > /usr/local/etc/php/conf.d/50-phalcon.ini && \
    rm -rf ~/cphalcon

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN wget -O /usr/local/bin/composer https://getcomposer.org/composer.phar && \
    chmod a+x /usr/local/bin/composer && \
    /usr/local/bin/composer global require zircote/swagger-php && \
    ln -s ~/.composer/vendor/zircote/swagger-php/bin/openapi /usr/local/bin/openapi


CMD ["php-fpm", "-F"]


EXPOSE 9000