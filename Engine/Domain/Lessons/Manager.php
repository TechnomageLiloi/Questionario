<?php

namespace Liloi\Rune\Domain\Lessons;

use Liloi\API\Errors\Exception;
use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Rune\Domain\Lessons\Types as ProblemsTypes;

use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

/**
 * Lessons manager.
 *
 * @package Liloi\Rune\Domain\Lessons
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
        return self::getTablePrefix() . 'lessons';
    }

    public static function schedule(string $date_now): array
    {
        $ts_start = date('Y-m-d', strtotime('monday this week'));
        $ts_finish = date('Y-m-d', strtotime('sunday this week'));

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_date between "%s" and "%s" order by key_date asc;',
            $name, $ts_start, $ts_finish
        ));

        $schedule = [];

        for($day=1;$day<=7;$day++)
        {
            $schedule[$day] = [];
            for ($hour=0;$hour<24;$hour++)
            {
                $schedule[$day][$hour] = [];
            }

            foreach (array_keys(Positions::$list) as $key)
            {
                $schedule[$day][$key] = [];
            }
        }

        foreach($rows as $row)
        {
            $entity = Entity::create($row);
            $schedule[$entity->getDateNumber()][$entity->getKeyPosition()][] = $entity;
        }

        return $schedule;
    }

    public static function loadTimetable(): ?Entity
    {
        $keyDate = ConfigManager::load(ConfigKeys::CURRENT_DATE)->getString();
        if(!$keyDate)
        {
            $keyDate = date('Y-m-d');
        }

        $keyPosition = ConfigManager::load(ConfigKeys::CURRENT_POSITION)->getString();
        if(!$keyPosition)
        {
            $keyPosition = Positions::FIRST;
        }

        return self::load($keyDate, $keyPosition);
    }

    public static function loadByDate(string $dt): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start desc;',
            $name, $dt . ' 00:00:00', $dt . ' 23:59:59'
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[$row['key_lesson']] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadKarma(string $dt): int
    {
        $name = self::getTableName();

        return (int)self::getAdapter()->getSingle(sprintf(
            'select sum(mark) from %s where status=%s and start between "%s" and "%s";',
            $name, Status::COMPLETE, $dt . ' 00:00:00', $dt . ' 23:59:59'
        ));
    }

    public static function load(string $keyDate, string $keyPosition): ?Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_date="%s" and key_position="%s"',
            $name,
            $keyDate,
            $keyPosition
        ));

        if(!$row)
        {
            return null;
        }

        return Entity::create($row);
    }

    /**
     * @return Entity
     * @throws Exception
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where status=%s order by start desc limit 1',
            $name, Status::IN_HAND
        ));

        if(!$row)
        {
            throw new Exception('Unknown key.');
        }

        return Entity::create($row);
    }

    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        $keyDate = $data['key_date'];
        unset($data['key_date']);

        $keyPosition = $data['key_position'];
        unset($data['key_position']);

        self::update(
            $name,
            $data,
            sprintf('key_date = "%s" and key_position = "%s"', $keyDate, $keyPosition)
        );
    }

    public static function remove(Entity $entity): void
    {
        $name = self::getTableName();
        $key = $entity->getKey();

        self::getAdapter()->delete(
            $name,
            sprintf('key_lesson = "%s"', $key)
        );
    }

    public static function create(string $keyDate, string $keyPosition): Entity
    {
        $name = self::getTableName();
        $data = [
            'key_date' => $keyDate,
            'key_position' => $keyPosition,
            'key_degree' => '1', // @todo: remove magic numbers
            'comment' => '-',
            'mark' => '0',
            'status' => Status::NO_LESSON,
            'start' => null,
            'finish' => null,
            'data' => '{}',
            'type' => Types::CODEX
        ];
        self::getAdapter()->insert($name, $data);
        $data['key_lesson'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }
}