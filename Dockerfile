# Use Ubuntu as the base image
FROM ubuntu:latest

# Set environment variables to avoid prompts during installation
ENV DEBIAN_FRONTEND=noninteractive

# Update system and install Apache, PHP, and required extensions
RUN apt update && apt install -y \
    apache2 \
    php \
    php-cli \
    nano htop \
    php-mongodb \
    php-curl \
    php-xml \
    php-mbstring \
    libapache2-mod-php \
    unzip \
    curl \
    && apt clean

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Force-enable short open tags
RUN echo "short_open_tag=On" >> /etc/php/8.3/apache2/php.ini

# Enable Apache modules
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy app files to the container
COPY app/ /var/www/html/

# Copy entrypoint script
COPY scripts/entry.sh /entry.sh
RUN chmod +x /entry.sh

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Use entry.sh as the container entrypoint
ENTRYPOINT ["/entry.sh"]
