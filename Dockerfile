FROM php:8.0.11-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libonig-dev \
    libpq-dev \
    openssl \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

# Set working directory
WORKDIR /app

# CMD bash -c "php artisan serve --host 0.0.0.0"
