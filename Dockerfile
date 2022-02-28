FROM php:fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql mbstring exif pcntl bcmath gd

#TODO: 
#configure nginx user and files ownership

# #create system user
# RUN useradd -G www-data, root -u $uid -d /home/$user $user

# RUN mkdir -p /home/$user/ .composer && \
#     chown -R $user:$user /home/$user

# #install php-composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# #set working dir
# #WORKDIR /var/www/public

# USER $user