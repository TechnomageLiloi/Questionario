<?php

namespace Liloi\Rune\Domain\Lessons;

/**
 * Types of problems.
 *
 * @package Liloi\Rune\Domain\Problems
 */
class Types
{
    public const CODEX = 1;
    public const BIOTECH = 2;
    public const EXAMS = 3;
    public const SOCNET = 4;
    public const QUESTS = 5;
    public const HORCRUXES = 6;
    public const FAMILY = 7;

    public static $list = [
        self::CODEX => 'Codex',
        self::BIOTECH => 'Biotech',
        self::EXAMS => 'Exams',
        self::SOCNET => 'Social Networks',
        self::QUESTS => 'Quests',
        self::HORCRUXES => 'Horcruxes',
        self::FAMILY => 'Family',
    ];
}