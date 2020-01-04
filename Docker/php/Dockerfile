#公式イメージの設定
FROM php:7.2-apache
#Apacheのwebrootの変更
ENV APACHE_DOCUMENT_ROOT /var/www/html/app/webroot
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
&& sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
&& a2enmod rewrite
#Linuxパッケージ、PHP拡張モジュールをインストール
RUN apt-get update && apt-get install -y \
    libicu-dev \
    zip \
    unzip \
&& docker-php-ext-install -j$(nproc) intl \
&& docker-php-ext-install -j$(nproc) pdo_mysql
#タイムゾーンを日本に変更
RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
#ホスト側カレントディレクトリ配下のファイル群をゲスト側の/var/www/html配下にコピー
COPY . /var/www/html
#composerのファイルをコピー
ENV COMPOSER_ALLOW_SUPERUSER 1
COPY --from=composer:1.7 /usr/bin/composer /usr/bin/composer
RUN cd ./app && \
    composer install --no-dev -o
CMD ["apache2-foreground"]