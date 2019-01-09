# OpenClassroom - PHP/Symphony Developer
# Project 8 _ Améliorez une application existante de ToDo & Co

## Base project
```
https://github.com/saro0h/projet8-TodoList
```
## Link of the Path
 ```
 https://openclassrooms.com/paths/59-developpeur-dapplication-php-symfony
 ```
## Quality Test :

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/27dcd01459ac4f8bb1e688cb1f705f6d)](https://app.codacy.com/app/jbaptisteq/OC_P8?utm_source=github.com&utm_medium=referral&utm_content=jbaptisteq/OC_P8&utm_campaign=Badge_Grade_Settings)

PHPUnit 7.5.1 by Sebastian Bergmann and contributors.

...................                                               19 / 19 (100%)

Time: 13.6 seconds, Memory: 44.00MB

OK (19 tests, 40 assertions)

## Languages used :
  html 5, CSS 3, PHP, MySQL

## Frameworks :
  symfony 3.4

## Getting Started :
    These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

## Prerequisites :
    For Windows you need a web development environment, like wampServer.
    Link and installation instructions available here
    ```
    http://www.wampserver.com/en/
    ```

## Installing :
   Clone project or Download and unzip on your folder choice this repository
   ```
   https://github.com/jbaptisteq/OC_P8/archive/master.zip
   ```

   Download and execute Composer in project folder for install Requirements
   ```
   https://getcomposer.org/
   php /path/to/composer.phar update
   ```

   Go to Project Root Folder
   Execute First line for checking database creation.
   Execute second line for create database
   ```
   php bin/console doctrine:schema:update  --dump-sql
   php bin/console doctrine:schema:update  --force
   ```

   Adding first data with Fixtures bundle
   ```
   php bin/console doctrine:fixtures:load
   Careful, database will be purged. Do you want to continue Y/N ?y
   ```

   You can also manually create a new database, import p8_jbq.sql on your database for install with a demo-version dataset.

   Open file app/config/parameters.yml and use your own access
  ```
  # This file is auto-generated during the composer install
  parameters:
      database_host: your host
      database_port: null
      database_name: yourname
      database_user: youruser
      database_password: null or yourpassword
      mailer_transport: smtp
      mailer_host: your host
      mailer_user: email for password recovery send
      mailer_password: yourpassword
      secret: **********
  ```

  You can now open website by running :
  ```
  localhost/your_folder_in_www_folder_from_wamp/web/app_dev.php/
  ```


  This dataset have an admin account for test, you can create others accounts.
  ```
  Administrator
   login : admin
   password : admin
  ```

  Docs
  ```
  Diagrams\aListOfDiagrams.md
  ```

## Built with
 * [ATOM](https://atom.io/) - Code
 * [WAMP](http://www.wampserver.com/en/) - Database management
