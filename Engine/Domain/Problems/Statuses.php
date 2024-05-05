<?php

namespace Liloi\Rune\Domain\Problems;

class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const NOT_IN_HAND = 5;
    public const COMPLETE = 3;
    public const ARCHIVE = 4;

    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::NOT_IN_HAND => 'Not in hand',
        self::COMPLETE => 'Complete',
        self::ARCHIVE => 'Archive (will be invisible)',
    ];
}