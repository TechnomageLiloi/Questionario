<?php

namespace Liloi\Rune\API\Lessons\Update;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;
use Liloi\Rune\Domain\Lessons\Status;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {

        $key_lesson = self::getParameter('key_lesson');

        $entity = Manager::load($key_lesson);
        $entity->setStart(date('Y-m-d H:i:s'));
        $entity->save();

        return new Response();
    }
}