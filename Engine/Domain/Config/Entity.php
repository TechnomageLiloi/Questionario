<?php

namespace Liloi\Rune\Domain\Config;

use Liloi\Tools\Entity as AbstractEntity;
use Liloi\Stylo\Parser;

/**
 * @todo: add tests
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_config');
    }

    public function getData(): string
    {
        return $this->getField('data');
    }

    public function setData(string $value): void
    {
        // @todo Extract param names to const.
        $this->data['data'] = $value;
    }

    public function getDataList(): array
    {
        return json_decode($this->getData(), true);
    }

    public function getString(): ?string
    {
        $data = $this->getDataList();

        if(!array_key_exists('value', $data))
        {
            return null;
        }

        return $data['value'];
    }

    public function setString(string $value): self
    {
        $data = $this->getDataList();
        $data['value'] = $value;
        $this->setDataList($data);

        return $this;
    }

    public function setDataList(array $value): void
    {
        $this->setData(json_encode($value, JSON_UNESCAPED_UNICODE));
    }

    public function save(): void
    {
        Manager::save($this);
    }
}