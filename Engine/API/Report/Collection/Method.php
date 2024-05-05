<?php

namespace Liloi\Rune\API\Report\Collection;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Report\Manager;
use Liloi\Rune\Domain\Report\Entity;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $collection = Manager::loadCollection();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'collection' => $collection
        ]));

        return $response;
    }
}