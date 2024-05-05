<?php

namespace Liloi\Rune\API\Horcruxes\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Horcruxes\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_problem = self::getParameter('key_horcrux');
        $entity = Manager::load($key_problem);

        $entity->setTitle(self::getParameter('title'));
        $entity->setSummary(self::getParameter('summary'));

        $entity->save();

        return new Response();
    }
}