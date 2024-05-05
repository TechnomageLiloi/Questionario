<?php

namespace Liloi\Rune\API\Problems\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Problems\Manager;
use Liloi\Rune\Domain\Problems\Statuses;

/**
 * TARDIS API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_problem');
        $entity = Manager::load($key_problem);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => Statuses::$list
        ]));

        return $response;
    }
}