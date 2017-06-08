<?php

namespace Malenki\HttpHeader\Fields;

class ArrayField extends Field implements \Countable
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

    public function setValue($value)
    {
        $lines = explode($this->primarySeparator, $value);

        $out = [];

        foreach ($lines as $line) {
            $prov = explode($this->secondarySeparator, $line);

            if (count($prov) === 2) {
                $out[$prov[0]] = $prov[1];
            } else {
                $out[] = reset($prov);
            }
        }

        $this->smartValue = $out;

        return $this;
    }

    public function count()
    {
        return count($this->smartValue);
    }
}
