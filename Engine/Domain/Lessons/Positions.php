<?php

namespace Liloi\Rune\Domain\Lessons;

/**
 * Lesson positions.
 *
 * @package Liloi\Rune\Domain\Problems
 */
class Positions
{
    public const FIRST = 1;
    public const SECOND = 2;
    public const THIRD = 3;
    public const FOURTH = 4;
    public const FIFTH = 5;
    public const SIXTH = 6;
    public const SEVENTH = 7;

    public static $list = [
        self::FIRST => 'First',
        self::SECOND => 'Second',
        self::THIRD => 'Third',
        self::FOURTH => 'Fourth',
        self::FIFTH => 'Fifth',
        self::SIXTH => 'Sixth',
        self::SEVENTH => 'Seventh',
    ];
}