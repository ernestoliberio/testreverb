Para tester:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:vFpCMxR+ya2oBJhg5KROmmssxh9QZCiBrudFwvAkdr4=
APP_DEBUG=true
APP_TIMEZONE=America/Guayaquil
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=192.168.1.5
DB_PORT=3306
DB_DATABASE=socket
DB_USERNAME=root
DB_PASSWORD=password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=reverb
FILESYSTEM_DISK=local
QUEUE_CONNECTION=redis

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=socket-cache
REDIS_PASSWORD=5Gk4J46bpeKvtU24A
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

REVERB_APP_ID=264487
REVERB_APP_KEY=6nvfwn1mvn7l77ichlsa
REVERB_APP_SECRET=cqysub3k5fkb8jnw4hvb
REVERB_HOST="localhost"
REVERB_PORT=8080
REVERB_SCHEME=http

VITE_REVERB_APP_KEY="${REVERB_APP_KEY}"
VITE_REVERB_HOST="${REVERB_HOST}"
VITE_REVERB_PORT="${REVERB_PORT}"
VITE_REVERB_SCHEME="${REVERB_SCHEME}"
```


cambiar DB_HOST=192.168.1.5 por la ip de tu red lan debidoa  que la base de datos no esta en contenedor.
una vez creada tu base de datos ejecuta php artisan migrate:fresh --seed

tienes dos usuarios un receptor@example.com con clave password y emisor@example.com

si ejecutas en la terminal php artisan app:send-tracking el sistema enviara a emisor el trackinn realtime

