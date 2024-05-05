<?php

namespace Liloi\Rune\Domain\Suites;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Entity: report record.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_suite');
    }

    public function getSummaryParse(): string
    {
        return Parser::parseString($this->getSummary());
    }

    /**
     * Save report record to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    public function getLink(): string
    {
        $name = $this->getKey();

        if($name === 'rune')
        {
            return '/';
        }

        $name = str_replace('rune:', '', $name);
        return '/' . str_replace(':', '/', $name);
    }
}