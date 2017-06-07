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

    public function __construct($fieldLine)
    {
        $this->getNameValueFromString($fieldLine);
    }

    public function getNameValueFromString($str)
    {
        $result = explode(':', $str);

        if (count($result) !== 2) {
            throw new \RuntimeException('Cannot extract valid name/value pair.');
        }

        $out = new \stdClass();
        $attrs = ['name', 'value'];

        foreach ($attrs as $idx => $attr) {
            $out->$attr = trim($result[$idx]);
        }

        return $out;
    }


    public function get()
    {
        // TODO
    }
}
