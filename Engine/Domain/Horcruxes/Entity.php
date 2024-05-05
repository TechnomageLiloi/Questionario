<?php

namespace Liloi\Rune\Domain\Horcruxes;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Horcrux entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getFinish()
 * @method void setFinish(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Gets Horcrux key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_horcrux');
    }

    /**
     * Saves Horcrux to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Removes Horcrux from database.
     */
    public function remove(): void
    {
        Manager::remove($this);
    }

    /**
     * Gets Horcrux status title.
     */
    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    /**
     * Stylo parse of summary.
     *
     * @return string
     */
    public function parseSummary(): string
    {
        return Parser::parseString($this->getSummary());
    }
}