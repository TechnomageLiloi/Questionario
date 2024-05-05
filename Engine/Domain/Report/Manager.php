<?php

namespace Liloi\Rune\Domain\Report;

use Liloi\Rune\Domain\Manager as DomainManager;

/**
 * Report record's manager.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'report';
    }

    public static function loadCollection(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s order by key_report desc limit 100;',
            $name
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function load(string $key_report): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_report="%s"',
            $name,
            $key_report
        ));

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_report'];
        unset($data['key_report']);

        self::getAdapter()->update(
            $name,
            $data,
            sprintf('key_report = "%s"', $key)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_report = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create(
        string $keyQuestion,
        bool $result,
        string $comment,
        array $data
    ): array
    {
        $name = self::getTableName();
        $rows = [
            'key_report' => date('Y-m-d H:i:s'),
            'key_question' => $keyQuestion,
            'result' => $result ? 1 : 0,
            'comment' => $comment,
            'data' => json_encode($data, JSON_UNESCAPED_UNICODE)
        ];
        self::getAdapter()->insert($name, $rows);

        return $rows;
    }
}