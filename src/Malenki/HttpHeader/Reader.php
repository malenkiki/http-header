<?php

namespace Malenki\HttpHeader;

// see https://en.wikipedia.org/wiki/List_of_HTTP_header_fields
// https://www.w3.org/Protocols/rfc2616/rfc2616-sec6.html
class Reader implements \Countable
{
    protected $responseLine;
    protected $fields;

    protected function extractResponseLine(&$rawFields)
    {
        $this->responseLine = new ResponseLine(array_shift($rawFields));
    }

    protected function extractFields(&$rawFields)
    {
        foreach ($rawFields as $field) {
            $solver = new Solver($field);
            $f = $solver->get();
            $this->fields->offsetSet($f->getName(), $f);
        }
    }

    public function __construct($url)
    {
        $this->fields = new \ArrayObject();
        
        $rawFields = get_headers($url);
        
        $this->extractResponseLine($rawFields);
        $this->extractFields($rawFields);

    }

    public function count()
    {
        return count($this->fields);
    }
}
