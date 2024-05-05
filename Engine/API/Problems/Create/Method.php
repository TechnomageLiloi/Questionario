<?php

namespace Liloi\Rune\API\Problems\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Problems\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyDegree = self::getParameter('key_degree');
        Manager::create($keyDegree);
        return new Response();
    }
}