<?php

namespace Liloi\Rune\API\Quests\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Quests\Manager;
use Liloi\Rune\Domain\Quests\Statuses;

/**
 * TARDIS API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_proble = self::getParameter('key_quest');
        $entity = Manager::load($key_proble);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Statuses::$list
        ]));

        return $response;
    }
}