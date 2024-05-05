<?php

namespace Liloi\Rune\API\Horcruxes\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Horcruxes\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        Manager::create();
        return new Response();
    }
}