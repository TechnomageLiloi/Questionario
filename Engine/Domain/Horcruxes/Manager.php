<?php

namespace Liloi\Rune\Domain\Horcruxes;

use Liloi\API\Errors\Exception;
use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'horcruxes';
    }

    /**
     * Load Horcrux from database.
     *
     * @param string $key_horcrux
     * @return Entity
     * @throws Exception
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where status in ("%s", "%s") order by key_horcrux desc;',
            $name, Statuses::TODO, Statuses::IN_HAND
        ));

        if(!$row)
        {
            return self::create();
        }

        return Entity::create($row);
    }

    /**
     * Load Horcrux from database.
     *
     * @param string $key_horcrux
     * @return Entity
     * @throws Exception
     */
    public static function load(string $key_horcrux): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_horcrux="%s"',
            $name,
            $key_horcrux
        ));

        if(!$row)
        {
            throw new Exception('Unknown UID');
        }

        return Entity::create($row);
    }

    /**
     * Save Horcrux to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_horcrux'];
        unset($data['key_horcrux']);

        self::update(
            $name,
            $data,
            sprintf('key_horcrux = "%s"', $key)
        );
    }

    /**
     * Remove Horcrux from database.
     *
     * @param Entity $entity
     */
    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_horcrux = "%s"', $key)
        );
    }

    /**
     * Create Horcrux in database.
     */
    public static function create(): Entity
    {
        $name = self::getTableName();
        $data = [
            'title' => '-',
            'summary' => '-',
            'status' => Statuses::IN_HAND,
            'start' => date('Y-m-d H:i:s')
        ];
        self::getAdapter()->insert($name, $data);
        $data['key_horcrux'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }
}