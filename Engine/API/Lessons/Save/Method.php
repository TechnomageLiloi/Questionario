<?php

namespace Liloi\Rune\API\Lessons\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;

/**
 * TARDIS API: Blueprint.Blueprints.Save
 * @package Liloi\Blueprint\API\Blueprints\Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_date = self::getParameter('key_date');
        $key_position = self::getParameter('key_position');

        $entity = Manager::load($key_date, $key_position);

        $entity->setKeyDegree(self::getParameter('degree'));
        $entity->setComment(self::getParameter('comment'));
        $entity->setMark(self::getParameter('mark'));
        $entity->setStart(self::getParameter('start'));
        $entity->setFinish(self::getParameter('finish'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setData(self::getParameter('data'));
        $entity->setType(self::getParameter('type'));

        $entity->save();

        return new Response();
    }
}