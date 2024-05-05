<?php

namespace Liloi\Rune\API\Report\Create;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Report\Manager;

/**
 * Rune API: Blueprint.Blueprints.Create
 * @package Liloi\Blueprint\API\Blueprints\Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyQuestion = self::getParameter('key_question');
        $result = self::getParameter('result');
        $comment = self::getParameter('comment');

        Manager::create($keyQuestion, $result, $comment, []);

        return new Response();
    }
}