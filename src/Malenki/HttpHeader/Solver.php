<?php

namespace Malenki\HttpHeader;

class Solver
{
    protected static $mapping = array(
        'Content-Length' => 'Int',
        'Content-Disposition' => 'Array',
        'Date' => 'Date',
        'Expires' => 'Date',
        'Last-Modified' => 'Date'
    );

    protected $field;


    protected function getClassNameFromName($name)
    {
        $fieldType = new Fields\FieldType($name);
        $type = $fieldType->get();

        return "\\Malenki\\HttpHeader\\Fields\\" . $type . "Field";
    }

    protected function getNameValueFromString($str)
    {
        $prov = explode(':', $str);

        $result = new \stdClass();
        $result->name  = array_shift($prov);
        $result->value = implode(':', $prov);

        if (empty($result->name) || empty($result->value)) {
            throw new \RuntimeException('Cannot extract valid name/value pair.');
        }

        $fullClassName = $this->getClassNameFromName($result->name);
        $out = new $fullClassName();
        $attrs = ['name', 'value'];

        foreach ($attrs as $idx => $attr) {
            $setter = "set" . ucfirst($attr);
            $out->$setter(trim($result->$attr));
        }

        return $out;
    }

    public function __construct($fieldLine)
    {
        $this->field = $this->getNameValueFromString($fieldLine);
    }

    public function get()
    {
        return $this->field;
    }
}
