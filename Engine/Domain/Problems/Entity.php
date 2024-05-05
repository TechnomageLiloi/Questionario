<?php

namespace Liloi\Rune\Domain\Problems;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * Problems entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 */
class Entity extends AbstractEntity
{
    /**
     * Get problem key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getField('key_problem');
    }

    /**
     * Get lesson key.
     *
     * @return string
     */
    public function getKeyDegree(): string
    {
        return $this->getField('key_degree');
    }

    /**
     * Save problem to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Remove problem from database.
     */
    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function isDone(): bool
    {
        return $this->getStatus() == Statuses::COMPLETE;
    }

    /**
     * Is problem in hand?
     *
     * @return bool `true` if so, `false` otherwise.
     */
    public function isInHand(): bool
    {
        return $this->getStatus() == Statuses::IN_HAND;
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