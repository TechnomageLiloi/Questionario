<?php

namespace Liloi\Rune\Domain\Degrees;

/**
 * Class Statuses
 */
class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const DEFENDED = 3;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::DEFENDED => 'Defended',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}