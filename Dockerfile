FROM php:8.4-apache

# Instala extensões necessárias para o Laravel e MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd

# Instala o Composer direto da imagem oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Altera o diretório raiz do Apache para a pasta 'public' do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos de configuração do Composer primeiro (ajuda no cache do Docker)
COPY composer.json composer.lock ./

# Instala as dependências dentro do container de forma otimizada
RUN composer install --no-scripts --no-autoloader --prefer-dist

# Copia o restante dos arquivos do projeto
COPY . .

# Finaliza a otimização do Composer
RUN composer dump-autoload --optimize

# Dá permissão para as pastas de armazenamento do Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache