<?php

namespace Liloi\Rune\Domain\Tickets;

use Liloi\API\Errors\Exception;
use Liloi\Rune\Domain\Manager as DomainManager;
use Liloi\Judex\Assert;

class Manager extends DomainManager
{
    public const POWER = '1';
    public const TIME_TODO = '00:00:00';

    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'tickets';
    }

    /**
     * Load problem from database.
     *
     * @param string $keyTicket
     * @return Entity
     * @throws Exception
     */
    public static function load(string $keyTicket): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_ticket="%s"',
            $name,
            $keyTicket
        ));

        if(!$row)
        {
            throw new Exception('Unknown ticket key.');
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
        $key = $data['key_ticket'];
        unset($data['key_ticket']);

        self::update(
            $name,
            $data,
            sprintf('key_ticket = "%s"', $key)
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
            sprintf('key_ticket = "%s"', $key)
        );
    }

    /**
     * Create problem in database.
     */
    public static function create(): Entity
    {
        $name = self::getTableName();
        $data = [
            'title' => '-',
            'start' => date('Y-m-d H:i:s'),
            'finish' => self::TIME_TODO,
            'power' => self::POWER
        ];

        self::getAdapter()->insert($name, $data);

        $data['key_ticket'] = \mysqli_insert_id(self::getAdapter()->getConnection()->get());
        return Entity::create($data);
    }

    public static function loadByLessonKeys(array $keysLessons): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_lesson in (%s) order by start asc',
            $name, implode(', ', $keysLessons)
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadToday(): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start asc',
            $name,
            date('Y-m-d H:i:s', strtotime('-24 hours')),
            date('Y-m-d H:i:s')
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Gets current karma.
     *
     * @return int
     */
    public static function loadKarma(): int
    {
        $nameTickets = self::getTableName();
        $nameLessons = self::getTablePrefix() . 'lessons';
        $dateStart = date('Y-m-d', strtotime('-1 week'));
        $dateFinish = date('Y-m-d');;

        $karma = self::getAdapter()->getSingle(sprintf(
            'select sum(%s.power) from %s, %s
             where %s.key_lesson = %s.key_lesson
             and %s.start between "%s" and "%s"',
            $nameTickets, $nameTickets, $nameLessons, $nameTickets, $nameLessons, $nameLessons, $dateStart, $dateFinish
        ));

        if(!$karma)
        {
            return 0;
        }

        return $karma;
    }

    public static function schedule(): array
    {
        $ts_start = date('Y-m-d 00:00:00', strtotime('monday this week'));
        $ts_finish = date('Y-m-d 23:59:59', strtotime('sunday this week'));

        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where start between "%s" and "%s" order by start asc;',
            $name, $ts_start, $ts_finish
        ));

        $schedule = [];

        for($day=1;$day<=7;$day++)
        {
            $schedule[$day] = [];
            for($hour=0;$hour<24;$hour++)
            {
                $schedule[$day][$hour] = [];
            }
        }

        foreach($rows as $row)
        {
            $entity = Entity::create($row);
            $schedule[$entity->getDay()][$entity->getHour()][] = $entity;
        }

        return $schedule;
    }
}