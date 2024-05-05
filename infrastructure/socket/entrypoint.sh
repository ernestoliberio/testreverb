#!/bin/sh
Red='\033[0;31m'          # Red
Green='\033[0;32m'        # Green
echo ""
echo "***********************************************************"
echo " Starting LARAVEL PHP Docker Container                 "
echo "***********************************************************"

set -e
  echo "${Green} install composer..."
  composer install --working-dir=/var/www/app --no-scripts --no-interaction --optimize-autoloader

   echo "${Green} Permissions..."
   chmod -Rf 775 /var/www/app/storage
   chmod -Rf 775 /var/www/app/bootstrap/cache

echo  "${Green} Install Npm and build"
cd /var/www/app
npm install
npm run build

rm -Rf /var/www/localhost/htdocs || true
mkdir -p /var/www/localhost/htdocs || true
ln -s /var/www/app/public/* /var/www/localhost/htdocs/

echo ""
echo "**********************************"
echo "     Starting Supervisord...     "
echo "***********************************"
/usr/bin/supervisord -c /etc/supervisord.conf
