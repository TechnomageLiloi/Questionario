<?php

namespace Liloi\Rune\API\Lessons\Edit;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager;
use Liloi\Rune\Domain\Lessons\Status;
use Liloi\Rune\Domain\Lessons\Types;
use Liloi\Rune\Domain\Degrees\Manager as DegreeManager;
use Liloi\Rune\Domain\Config\Manager as ConfigManager;
use Liloi\Rune\Domain\Config\Keys as ConfigKeys;

/**
 * TARDIS API: Blueprint.Blueprints.Edit
 * @package Liloi\Blueprint\API\Blueprints\Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $listDegreeActive = DegreeManager::loadActiveKeyList();
        $key_date = self::getParameter('key_date');
        $key_position = self::getParameter('key_position');

        ConfigManager::load(ConfigKeys::CURRENT_DATE)->setString($key_date)->save();
        ConfigManager::load(ConfigKeys::CURRENT_POSITION)->setString($key_position)->save();

        $entity = Manager::load($key_date, $key_position);
        if(!$entity)
        {
            $entity = Manager::create($key_date, $key_position);
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'degrees' => $listDegreeActive,
            'entity' => $entity,
            'statuses' => Status::$list,
            'types' => Types::$list,
        ]));

        return $response;
    }
}