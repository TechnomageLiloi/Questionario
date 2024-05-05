<?php

namespace Liloi\Rune\Domain\Config;

use Liloi\Rune\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'config';
    }

    public static function load(string $key): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_config="%s"',
            $name, $key
        ));

        if(!$row)
        {
            $row = [
                'key_config' => $key,
                'data' => '{}'
            ];

            // @todo: repair insert for JSON
            self::getAdapter()->getConnection()->request(
                sprintf("insert into rune_config(key_config, data) values('%s', '{}')", $key)
            );
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_config'];
        unset($data['key_config']);

        self::update(
            $name,
            $data,
            sprintf('key_config = "%s"', $key)
        );
    }

    // @todo: rise this method to more abstract level.
    public static function create($row): void
    {
        $name = self::getTableName();
        self::getAdapter()->insert($name, $row);
    }
}