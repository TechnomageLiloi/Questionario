<?php

namespace Liloi\Rune\API\Lessons\Schedule;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Tickets\Manager as TicketsManager;

/**
 * TARDIS API: Blueprint.Blueprints.Show
 * @package Liloi\Blueprint\API\Blueprints\Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $schedule = TicketsManager::schedule();

        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ];

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'days' => $days,
            'schedule' => $schedule
        ]));

        return $response;
    }
}