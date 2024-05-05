<?php

namespace Liloi\Rune\API\Quests\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Quests\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Remove
 * @package Liloi\Blueprint\API\Blueprints\Remove
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_problem = self::getParameter('key_quest');
        $entity = Manager::load($key_problem);
        $entity->remove();

        return new Response();
    }
}