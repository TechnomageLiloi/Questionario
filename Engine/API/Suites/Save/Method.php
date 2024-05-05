<?php

namespace Liloi\Rune\API\Suites\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Suites\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_question = self::getParameter('key_suite');
        $entity = Manager::load($key_question);

        $entity->setTitle(self::getParameter('title'));
        $entity->setSummary(self::getParameter('summary'));

        $entity->save();

        return new Response();
    }
}