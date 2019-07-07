# PDO Connect

### Easy connect to PDO object.

#### REQUIREMENTS

- PHP version > 7.0
- Nginx, Apache

#### INSTALLATION

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Check the [composer.json](https://github.com/aksafan/yii2-fcm-both-api/blob/master/composer.json) for this extension's requirements and dependencies.

###### Install library:

Enter this command into Terminal:

```
composer require pro100rost/pdo-connect
```

###### Create configuration file:

Create file `config.ini` in the root directory of your project.

File input (for example):

```
[database]
dbms = pgsql
db_host = localhost
db_username = test
db_password = 12345678
db_name = test_db
```

###### Using:

Create object for class QueryCommand and use one of method.