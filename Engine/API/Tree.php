<?php

namespace Liloi\Rune\API;

use Liloi\API\Manager;
use Liloi\API\Method;
use Liloi\Rune\API\Method as RuneMethod;

/**
 * @inheritDoc
 */
class Tree
{
    private static ?self $instance = null;

    private Manager $manager;

    private function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @obsolete It is centralized, which is incorrect.
     * @todo Add general API Pool.
     * @return static
     */
    public static function getInstance(): self
    {
        if(self::$instance === null)
        {
            $manager = new Manager();

            $manager->add(new Method('Exams.Report.Collection', '\Liloi\Rune\API\Report\Collection\Method::execute'));
            $manager->add(new Method('Exams.Report.Create', '\Liloi\Rune\API\Report\Create\Method::execute'));

            $manager->add(new Method('Rune.Suites.Edit', '\Liloi\Rune\API\Suites\Edit\Method::execute'));
            $manager->add(new Method('Rune.Suites.Save', '\Liloi\Rune\API\Suites\Save\Method::execute'));

            $manager->add(new Method('Exams.Questions.Collection', '\Liloi\Rune\API\Questions\Collection\Method::execute'));
            $manager->add(new Method('Exams.Questions.Create', '\Liloi\Rune\API\Questions\Create\Method::execute'));
            $manager->add(new Method('Exams.Questions.Remove', '\Liloi\Rune\API\Questions\Remove\Method::execute'));
            $manager->add(new Method('Exams.Questions.Edit', '\Liloi\Rune\API\Questions\Edit\Method::execute'));
            $manager->add(new Method('Exams.Questions.Save', '\Liloi\Rune\API\Questions\Save\Method::execute'));
            $manager->add(new Method('Exams.Questions.Show', '\Liloi\Rune\API\Questions\Show\Method::execute'));
            $manager->add(new Method('Exams.Questions.Test', '\Liloi\Rune\API\Questions\Test\Method::execute'));
            $manager->add(new Method('Exams.Questions.Suite', '\Liloi\Rune\API\Questions\Suite\Method::execute'));

            //

            $manager->add(new Method('TARDIS.Plan.Show', '\Liloi\Rune\API\Plan\Show\Method::execute'));

            $manager->add(new Method('TARDIS.Degrees.Collection', '\Liloi\Rune\API\Degrees\Collection\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Show', '\Liloi\Rune\API\Degrees\Show\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Create', '\Liloi\Rune\API\Degrees\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Remove', '\Liloi\Rune\API\Degrees\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Edit', '\Liloi\Rune\API\Degrees\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Degrees.Save', '\Liloi\Rune\API\Degrees\Save\Method::execute'));

            $manager->add(new Method('TARDIS.Lessons.Create', '\Liloi\Rune\API\Lessons\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Edit', '\Liloi\Rune\API\Lessons\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Save', '\Liloi\Rune\API\Lessons\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Show', '\Liloi\Rune\API\Lessons\Show\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Remove', '\Liloi\Rune\API\Lessons\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Schedule', '\Liloi\Rune\API\Lessons\Schedule\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Timetable', '\Liloi\Rune\API\Lessons\Timetable\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Update', '\Liloi\Rune\API\Lessons\Update\Method::execute'));
            $manager->add(new Method('TARDIS.Lessons.Calculate', '\Liloi\Rune\API\Lessons\Calculate\Method::execute'));

            $manager->add(new Method('TARDIS.Problems.Create', '\Liloi\Rune\API\Problems\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Problems.Remove', '\Liloi\Rune\API\Problems\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Problems.Edit', '\Liloi\Rune\API\Problems\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Problems.Save', '\Liloi\Rune\API\Problems\Save\Method::execute'));

            $manager->add(new Method('TARDIS.Tickets.Create', '\Liloi\Rune\API\Tickets\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Tickets.Remove', '\Liloi\Rune\API\Tickets\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Tickets.Edit', '\Liloi\Rune\API\Tickets\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Tickets.Save', '\Liloi\Rune\API\Tickets\Save\Method::execute'));

            $manager->add(new Method('TARDIS.Quests.Create', '\Liloi\Rune\API\Quests\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Remove', '\Liloi\Rune\API\Quests\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Edit', '\Liloi\Rune\API\Quests\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Save', '\Liloi\Rune\API\Quests\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Quests.Done', '\Liloi\Rune\API\Quests\Done\Method::execute'));

            $manager->add(new Method('TARDIS.Horcruxes.Create', '\Liloi\Rune\API\Horcruxes\Create\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Remove', '\Liloi\Rune\API\Horcruxes\Remove\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Edit', '\Liloi\Rune\API\Horcruxes\Edit\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Save', '\Liloi\Rune\API\Horcruxes\Save\Method::execute'));
            $manager->add(new Method('TARDIS.Horcruxes.Done', '\Liloi\Rune\API\Horcruxes\Done\Method::execute'));

            self::$instance = new self($manager);
        }

        return self::$instance;
    }

    public function execute(): string
    {
        // @todo: optimize

//        if(strpos($_POST['method'], 'Rune.User.') !== false)
//        {
//            return $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? [])->asJson();
//        }
//
//        if(strpos($_POST['method'], 'Rune.Security.') === false)
//        {
//            RuneMethod::accessCheck();
//        }

        // @todo: add dynamic API search (by namespace).
        $response = $this->manager->search($_POST['method'])->execute($_POST['parameters'] ?? []);
        return $response->asJson();
    }

    /**
     * Get API manager.
     *
     * @return Manager
     */
    public function getManager(): Manager
    {
        return $this->manager;
    }
}