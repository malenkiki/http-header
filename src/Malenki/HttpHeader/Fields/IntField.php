<?php

namespace Malenki\HttpHeader\Fields;

class IntField extends Field
{
    public function setValue($value)
    {
        $this->smartValue = (int) $value;
    }
}
