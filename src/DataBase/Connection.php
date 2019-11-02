<?php
namespace App\DataBase;

use PDO;

class Connection
{
    private static $pdo;

    public static function creatConnect(): PDO
    {
        if (!self::$pdo instanceof PDO) {
            $dsn = 'mysql:localhost;port=3306;dbname=test;charset=utf8';
            $user = 'root';
            $pass = '';

            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // выводит ошибки и выводит инфу ассациотивным массивом
            ];

            self::$pdo = new PDO($dsn, $user, $pass, $options);
        }

        return self::$pdo;
    }
}
