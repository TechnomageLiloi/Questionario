<?php

namespace Liloi\Rune\API\Questions\Save;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Questions\Manager;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_question = self::getParameter('key_question');
        $entity = Manager::load($key_question);

        $entity->setKeySuite(self::getParameter('key_suite'));
        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setType(self::getParameter('type'));
        $entity->setProgram(self::getParameter('program'));
        $entity->setTheory(self::getParameter('theory'));
        $entity->setTags(self::getParameter('tags'));
        $entity->setDt(self::getParameter('dt'));
        $entity->setData(self::getParameter('data'));
        $entity->setPower(self::getParameter('power'));

        $entity->save();

        return new Response();
    }
}