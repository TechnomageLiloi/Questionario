<?php

namespace Liloi\Rune\API\Questions\Suite;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Questions\Manager;
use Liloi\Rune\API\Questions\Test\Method as TestMethod;

class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $tags = self::getParameter('tags');
        $collection = Manager::loadByTags($tags);

        $renders = [];
        foreach($collection as $entity)
        {
            $renders[] = TestMethod::renderTest($entity);
        }

        $response = new Response();

        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'renders' => $renders
        ]));

        return $response;
    }
}