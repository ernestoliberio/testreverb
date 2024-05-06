#!/bin/sh
Red='\033[0;31m'          # Red
Green='\033[0;32m'        # Green
echo ""
echo "***********************************************************"
echo " Starting LARAVEL PHP Docker Container                 "
echo "***********************************************************"

set -e
  echo "${Green} install composer..."
  composer install --working-dir=/var/www/html --no-scripts --no-interaction --optimize-autoloader

   echo "${Green} Permissions..."
   chmod -Rf 775 /var/www/html/storage
   chmod -Rf 775 /var/www/html/bootstrap/cache

echo  "${Green} Install Npm and build"
cd /var/www/html
npm install
npm run build

echo ""
echo "**********************************"
echo "     Starting Supervisord...     "
echo "***********************************"
/usr/bin/supervisord -c /etc/supervisord.conf
