<?php

namespace Malenki\HttpHeader\Fields;

abstract class Field
{
    protected $name;
    protected $value;
    protected $smartValue;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;
        $this->smartValue = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->smartValue;
    }

    public function __toString()
    {
        return (string) $this->value;
    }
}
