<?php

namespace Liloi\Rune\Domain\Lessons;

class Status
{
    public const NO_LESSON = 4;
    public const TODO = 1;
    public const IN_HAND = 2;
    public const COMPLETE = 3;

    public static $list = [
        self::NO_LESSON => 'No lesson',
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::COMPLETE => 'Complete'
    ];

    /**
     * Gets lesson status class.
     *
     * @return string
     */
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}