<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">SIKD Web</h1>
    <br>
</p>

Proyek ini digunakan untuk mengolah data APBD dari SIPD Kemendagri untuk menghasilkan data Spreadsheet yang akan diupload ke aplikasi SINERGI/SIKD.

Semua proyek ini akan berjalan di console/command prompt. Tidak ada yang akan berjalan di website.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

Proyek ini mengharuskan install versi minimal PHP : 5.6.0.


INSTALLATION
------------

Download code, dari menu diatas, Code -> Download ZIP.

Atau clone melalui git
~~~
git clone https://github.com/biladina/sikd_web.git
~~~


Setelah itu jalankan perintah update composer untuk menginstall vendor:
~~~
composer update
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Setelah itu, aplikasi bisa dijalankan melalui console :
~~~
php yii
~~~
Atau kalau di windows :
~~~
yii.bat
~~~