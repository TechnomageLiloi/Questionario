<?php

namespace Liloi\Rune\Domain\Questions;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * Question's entity.
 *
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getTheory()
 * @method void setTheory(string $value)
 *
 * @method string getTags()
 * @method void setTags(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 *
 * @method string getPower()
 * @method void setPower(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_question');
    }

    public function getKeySuite(): string
    {
        return $this->getField('key_suite');
    }

    public function setKeySuite(string $key_suite): void
    {
        $this->setField('key_suite', $key_suite);
    }

    public function getTypeTitle(): string
    {
        return Types::$list[$this->getType()];
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }


    public function getPowerTitle(): string
    {
        return Powers::$list[$this->getPower()];
    }

    public function getStatusClass(): string
    {
        // @todo: string to class
        $status = strtolower($this->getStatusCaption());
        return str_replace(' ', '-', $status);
    }

    public function getParse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function getElement(string $key)
    {
        $data = json_decode($this->getProgram(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
    }

    /**
     * Save question to database.
     */
    public function save(): void
    {
        Manager::save($this);
    }

    /**
     * Set question's status as {@see Statuses::OBSOLETE} and save to database.
     */
    public function remove(): void
    {
        $this->setStatus(Statuses::OBSOLETE);
        $this->save();
    }

    public function getParseTheory(): string
    {
        return Parser::parseString($this->getTheory());
    }

    public function getDataElement(string $key)
    {
        $data = json_decode($this->getData(), JSON_UNESCAPED_UNICODE);

        return $data[$key];
    }
}