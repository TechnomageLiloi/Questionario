<?php

namespace Liloi\Rune\API\Questions\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;

use Liloi\Rune\Domain\Questions\Manager;
use Liloi\Rune\Domain\Questions\Powers;
use Liloi\Rune\Domain\Questions\Statuses;
use Liloi\Rune\Domain\Questions\Types;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_question = self::getParameter('key_question');
        $entity = Manager::load($key_question);

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'powers' => Powers::$list,
            'statuses' => Statuses::$list,
            'types' => Types::$list,
        ]));

        return $response;
    }
}