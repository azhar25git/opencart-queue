# opencart-queue
Make Queueable for opencart

## Requrements
-   Opencart 3.x
-   PHP 7.3+
-   Redis 2.2+
-   Optional but Recommended: Composer
-   Suppervisor


## How to install
1.  copy queue folder to system/library
2.  copy server to root directory 
-   Note(For security you can copy server to root or another place and edit incluce config file to opencart)

```php
// Edit to right opencart config when you not place server.php in root
require_once 'config.php';
```

## How to using 
Queueing Jobs (Mail example)
```php
$requeue = new \Queue\Requeue();
$requeue->enqueue('mail', \Queue\Mail::class, [
    'from'    => 'test@gmail.com',
    'to'      => 'demo@gmail.com',
    'sender'  => 'Store Name',
    'subject' => 'Test mail queue',
    'message' => 'This message send from queue'
]);
```

### Config with suppervisor
#### 1.  Centos 
```shell script
sudo yum update -y
sudo yum install epel-release
sudo yum -y install supervisor

sudo systemctl start supervisord
sudo systemctl enable supervisord

cd etc/supervisor.d/
touch opencart.ini

nano opencart.ini

[program:opencart]
process_name=%(program_name)s_%(process_num)02d
command=php .../path/server #path to server absolute file
autostart=true
autorestart=true
user=admin
numprocs=5
redirect_stderr=true
stdout_logfile=/var/logs/queue.log

sudo supervisorctl reread
sudo supervisorctl update
```

#### 2. For another operator system you can search for install and config suppervisor