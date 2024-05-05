<?php

namespace Liloi\Rune\API\Degrees\Remove;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Degrees\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Remove
 * @package Liloi\Blueprint\API\Blueprints\Remove
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $uid = self::getParameter('uid');
        $entity = Manager::load($uid);
        $entity->remove();

        return new Response();
    }
}