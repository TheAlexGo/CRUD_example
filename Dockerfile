FROM php:8.0.11-fpm

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . ./

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libonig-dev \
    libpq-dev \
    openssl \
    zip \
    unzip
    #npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install
#RUN npm install

CMD bash -c "php artisan serve --host 0.0.0.0"
