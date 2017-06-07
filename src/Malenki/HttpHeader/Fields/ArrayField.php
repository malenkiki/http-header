<?php

namespace Malenki\HttpHeader\Fields;

class ArrayFields extends Field implements \Countable
{
    protected $primarySeparator = ';';
    protected $secondarySeparator = '=';

    public function getSeparator()
    {
        return $this->getPrimarySeparator();
    }

    public function getPrimarySeparator()
    {
        return $this->primarySeparator;
    }

    public function getSecondarySeparator()
    {
        return $this->secondarySeparator;
    }

    public function getValue()
    {
        if (is_array($this->smartValue)) {
            return $this->smartValue;
        }

        $lines = explode($this->primarySeparator, $this->value);

        $out = [];

        foreach ($lines as $line) {
            list($key, $val) = explode($this->secondarySeparator, $line);
            $out[$key] = $val;
        }

        $this->smartValue = $out;

        return $this->smartValue;
    }
}
