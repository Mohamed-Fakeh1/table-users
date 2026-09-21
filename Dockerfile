FROM php:8.4-apache

# تثبيت الحزم المطلوبة للنظام
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# تثبيت امتدادات PHP التي يحتاجها Laravel
RUN docker-php-ext-install pdo_mysql mbstring exip bcmath gd

# تفعيل موديل الـ Rewrite في Apache
RUN a2enmod rewrite

# توجيه الـ Server لمجلد public الخاص بـ Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ ملفات المشروع
WORKDIR /var/www/html
COPY . .

# تثبيت مكتبات Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# إعطاء الصلاحيات المباشرة لمجلدات الـ Storage والـ Cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80