Yii 2 API application
===============================

API application for getting currency rates

Run
-------------------
Clone a project
```
git clone git@github.com:Ivanitch/yii2-currency.git .
```
Copy config file and connect to database
```
cp common/config/main-local.php.dist common/config/main-local.php
```
Install dependencies
```
composer update
```
Run migrations.
```
php yii migrate
```
When creating **init** migration, the **admin** user is created with the **admin** password
Assign the **admin** role to the **admin** user
```
$ php yii role/assign
Username: admin
Role: [admin,user,?]: admin
Done!
```
Configuring a virtual host in Apache
----------------------
```
<VirtualHost *:80>
ServerName example.com
DocumentRoot /var/www/html/example.com/api/web
</VirtualHost>
```
Authorization
----------------------
Request a token
```
curl -X POST "Accept: application/json" -d "username=admin&password=admin" http://example.com/auth
```
Get the token and timestamp when it expires

Profile
```
curl -H "Authorization: Bearer <token>" http://example.com/profile
```
Get all currencies
```
curl -H "Authorization: Bearer <token>" http://example.com/currencies
```
Currency rate by ID
```
curl -H "Authorization: Bearer <token>" http://example.com/currencies/11
```
Updating currencies from the console
```
php /var/project/yii currency/update
```
Updating Cron Data
```
31 13 * * * php /var/project/yii currency/update
```
Data is automatically updated at 13.31 (Moscow time)

Tests
----------------------
Specify url in the config file
```
cp tests/api.suite.yml.dist tests/api.suite.yml
```
Run tests
```
./vendor/bin/codecept run "tests/api" --steps
```