<?php

namespace Liloi\Rune\Domain\Problems;

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
        return self::getTablePrefix() . 'problems';
    }

    public static function loadByDegreeKeys(array $keysDegrees): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_degree in (%s) and status != "%s" order by title asc',
            $name, implode(', ', $keysDegrees), Statuses::ARCHIVE
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Load problem from database.
     *
     * @param string $key_problem
     * @return Entity
     * @throws Exception
     */
    public static function load(string $key_problem): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_problem="%s"',
            $name,
            $key_problem
        ));

        if(!$row)
        {
            throw new Exception('Unknown UID');
        }

        return Entity::create($row);
    }

    /**
     * Save problem to database.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        // @todo: Get param name from const.
        $key = $data['key_problem'];
        unset($data['key_problem']);

        self::update(
            $name,
            $data,
            sprintf('key_problem = "%s"', $key)
        );
    }

    /**
     * Remove problem from database.
     *
     * @param Entity $entity
     */
    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_problem = "%s"', $key)
        );
    }

    /**
     * Create problem in database.
     *
     * @param string $keyDegree
     */
    public static function create(string $keyDegree): void
    {
        Assert::notEmpty($keyDegree, 'Degree key is empty');

        $name = self::getTableName();
        $data = [
            'key_degree' => $keyDegree,
            'title' => '-',
            'summary' => '-',
            'status' => Statuses::TODO
        ];
        self::getAdapter()->insert($name, $data);
    }
}