<?php

namespace Liloi\Rune\Domain\Lessons;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @method string getComment()
 * @method void setComment(string $value)
 *
 * @method string getMark()
 * @method void setMark(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getStart()
 * @method void setStart(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getPosition()
 * @method void setPosition(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_date');
    }

    public function getKeyPosition(): string
    {
        return $this->getField('key_position');
    }

    public function getKeyDegree(): string
    {
        return $this->getField('key_degree');
    }

    public function setKeyDegree(string $value): void
    {
        $this->setField('key_degree', $value);
    }

    public function getDateNumber(): int
    {
        return (int)date('N', strtotime($this->getKey()));
    }

    public function getTime(): int
    {
        return (int)date('G', strtotime($this->getStart()));
    }

    public function getTitle(): string
    {
        return $this->getComment();
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function remove(): void
    {
        Manager::remove($this);
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    /**
     * Gets lesson status class.
     *
     * @return string
     */
    public function getStatusClass(): string
    {
        return Status::getClass($this->getStatus());
    }

    /**
     * Gets lesson status title.
     *
     * @return string
     */
    public function getStatusTitle(): string
    {
        return Status::$list[$this->getStatus()];
    }

    /**
     * `true` is lesson is completed, `false` otherwise.
     *
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->getStatus() == Status::COMPLETE;
    }

    /**
     * `true` is no lesson, `false` otherwise.
     *
     * @return bool
     */
    public function isNoLesson(): bool
    {
        return $this->getStatus() == Status::NO_LESSON;
    }
}