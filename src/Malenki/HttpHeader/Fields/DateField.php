<?php

namespace Malenki\HttpHeader\Fields;

class DateField extends Field
{
    public function setValue($value)
    {
        $this->smartValue = new \DateTime($value);
    }
}
