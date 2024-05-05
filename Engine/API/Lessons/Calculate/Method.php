<?php

namespace Liloi\Rune\API\Lessons\Calculate;

use Liloi\API\Response;
use Liloi\Rune\API\Method as SuperMethod;
use Liloi\Rune\Domain\Lessons\Manager as LessonsManager;
use Liloi\Rune\Domain\Tickets\Manager as TicketsManager;
use Liloi\Rune\Domain\Tickets\Entity as TicketsEntity;

// @obsolete: Should remove in the next version.
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyLesson = self::getParameter('key_lesson');

        $collectionTickets = TicketsManager::loadByLessonKeys([$keyLesson]);

        $karmaTotal = 0;

        /** @var TicketsEntity $ticket */
        foreach($collectionTickets as $ticket)
        {
            $karmaTotal += (int)$ticket->getKarma();
        }

        $lesson = LessonsManager::load($keyLesson);
        $lesson->setMark($karmaTotal);
        $lesson->save();

        return new Response();
    }
}