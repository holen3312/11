<?php
namespace MyProject\Services;

use myProject\Exception\DbException;

class Db
{
    private $pdo;
    private static $instancesCount = 0;

    private static $instance;

    public function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];
        try{

            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';db_name=' . $dbOptions['dbname'] . ';',

                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('set names utf8');
        } catch (\PDOException $e) {
            throw new DbException('Ошибка при подключении к базе данных:' . $e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function query(string $sql, $params =[], string $className = 'stdClass') : ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
}
