<?php

namespace Liloi\Rune\Domain\Questions;

/**
 * Question's statuses.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Statuses
{
    public const TODO = 1;
    public const COMPOSING = 2;
    public const ACTIVE = 3;
    public const OBSOLETE = 4;

    public static $list = [
        self::TODO => 'To Do',
        self::COMPOSING => 'Composing',
        self::ACTIVE => 'Active',
        self::OBSOLETE => 'Obsolete'
    ];
}