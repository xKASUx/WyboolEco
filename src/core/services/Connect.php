<?php

// Выполнила команда разработчиков WyboolDev | dev.wybool.ru

namespace core\services;

class Connect
{
    private $pdo;
    public static $instanse;

    public function __construct() // Подключение базы данных через Config
    {
        $config = (require __DIR__ . '/../settings.php')['db'];
        $this->pdo = new \PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, array $params = []) // Функция для обработки запросов, используя PDO
    {
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if ($res === false) {
            return null;
        }
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getInstanse() // Инициализация базы данных
    {
        if (self::$instanse === null) {
            return self::$instanse = new self();
        }
        return self::$instanse;
    }

    public static function lastInsertId() // Возвращает последний вставленный id
    {
        return self::getInstanse()->pdo->lastInsertId();
    }
}
