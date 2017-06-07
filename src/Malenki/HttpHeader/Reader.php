<?php

namespace Malenki\HttpHeader;

// see https://en.wikipedia.org/wiki/List_of_HTTP_header_fields
class Reader implements \Countable
{
    protected $fields;

    public function __construct($url)
    {
        $this->fields = new \ArrayIterator();
        $fields = get_headers($url);

        foreach ($fields as $field) {
            $solver = new Solver($field);
            $f = $solver->get();
            $this->fields->append($f);
        }
    }

    public function count()
    {
        return count($this->fields);
    }
}
