<?php

namespace Liloi\Rune\Domain\Questions;

class Powers
{
    public const PROBLEM = 1;
    public const CONFRONTATION = 2;

    public static $list = [
        self::PROBLEM => 'Problem (premonition)',
        self::CONFRONTATION => 'Confrontation (result)',
    ];
}