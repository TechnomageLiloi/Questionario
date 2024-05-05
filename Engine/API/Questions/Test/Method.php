<?php

namespace Liloi\Rune\API\Questions\Test;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Questions\Manager;
use Liloi\Rune\Domain\Questions\Statuses;
use Liloi\Rune\Domain\Questions\Types;
use Liloi\Rune\Domain\Questions\Entity;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $key_question = self::getParameter('key_question');
        $entity = Manager::load($key_question);

        $response = new Response();
        $response->set('render', self::renderTest($entity));
        return $response;
    }

    public static function renderTest(Entity $entity): string
    {

        // @todo: encapsulate block at entity
        switch ($entity->getType())
        {
            case Types::CHECK:
                $template = 'Check'; break;
            case Types::RADIO:
                $template = 'Radio'; break;
            case Types::SENTENCE:
                $template = 'Sentence'; break;
            case Types::DONE:
                $template = 'Done'; break;
            case Types::VIDEO:
                $template = 'Video'; break;
            case Types::CARD:
            default: $template = 'Card';
        }

        return static::render(__DIR__ . '/' . $template . '.tpl', [
            'entity' => $entity
        ]);
    }
}