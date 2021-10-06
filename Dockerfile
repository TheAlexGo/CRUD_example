FROM php:8.0.11-fpm

# Set working directory
WORKDIR /var/www

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libonig-dev \
    libpq-dev \
    openssl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . ./

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]