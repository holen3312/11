<?php
namespace myProject\Models;
use MyProject\Services\Db;
abstract class ActiveRecordEntity
{
    /** @var int */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $db = new Db();
        return $db->query('SELECT * FROM ' . static::getTableName() . ';', [], static::class);
    }

    abstract protected static function getTableName(): string;

    public static function  getById(int $id): ?self
    {
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id !== null) {
            $this->update($mappedProperties);
        } else {
            $this->insert($mappedProperties);
        }
    }

    private function update(array $mappedProperties): void
    {
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; // column1 = :param1
            $params2values[$param] = $value; // [:param1 => value1]
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
    }


    private function insert(array $mappedProperties): void
    {
        $filteredProperties = array_filter($mappedProperties);
        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filteredProperties as $columnName => $value) {
            $columns[] = '`' . $columnName. '`';
            $paramName = ':' . $columnName;
            $paramsNames[] = $paramName;
            $params2values[$paramName] = $value;
        }

        $columnsViaSemicolon = implode(', ', $columns);
        $paramsNamesViaSemicolon = implode(', ', $paramsNames);

        $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';

        $db = Db::getInstance();
        $db->query($sql, $params2values, static::class);
        $this->id = $db->getLastInsertId();
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();

        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName(); // не будет значение, только имя
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }// зочем же мы это делаем? для того, шоб связать данные с БД и нашим файлом тут(подчеркушки и НЕподчеркушки, типа createdAt i created_At

        return $mappedProperties;
    }
    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }
    public function delete(): void
    {
        $db = Db::getInstance();
        $sql = 'DELETE FROM' . static::getTableName() . 'where id = ' . $this->id;
        $db->query($sql);
        $this->id = null;
    }
    public static function findOneByColumn(string $columnName, $value): ?self
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM ' . static::getTableName() . ' WHERE ' . $columnName . ' = :value LIMIT 1;',
            [':value' => $value],
            static::class
        );
        if ($result === []) {
            return null;
        }
        return $result[0];
    }

}