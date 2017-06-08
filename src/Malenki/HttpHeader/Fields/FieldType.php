<?php

namespace Malenki\HttpHeader\Fields;

class FieldType
{
    protected $name;

    protected function isIn($arr)
    {
        return in_array($this->name, $arr);
    }

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function isArrayType()
    {
        return $this->isIn([
            'Accept-Patch', 'Alt-Svc', 'Content-Disposition', 'Content-Type', "Link", "Public-Key-Pins", "Refresh", "Set-Cookie", "Strict-Transport-Security", "X-XSS-Protection"
        ]);
    }
    
    public function isCommaArrayType()
    {
        return $this->isIn([
            'Allow', "Upgrade", "Via"
        ]);
    }

    public function isIntType()
    {
        return $this->isIn([
            'Age', 'Content-Length'
        ]);
    }

    public function isDateType()
    {
        return $this->isIn([
            'Date', 'Expires', 'Last-Modified'
        ]);
    }

    public function isDateOrIntType()
    {
        return $this->isIn([
            'Retry-After'
        ]);
    }

    public function get()
    {
        $methods = get_class_methods($this);

        foreach ($methods as $method) {
            if (!preg_match('/^is[a-zA-Z-]+Type$/', $method)) {
                continue;
            }

            if ($this->$method()) {
                return preg_replace('/Type$/', '', preg_replace('/^is/', '', $method));
            }
        }

        return '';
    }
}
