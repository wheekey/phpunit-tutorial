<?php

namespace App\Support;

use Exception;
use Traversable;

class Collection implements \IteratorAggregate, \JsonSerializable
{

    protected $items = [];

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;
    }


    public function count()
    {
        return count($this->items);
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function merge(Collection $collection)
    {
        return $this->add($collection->get());
    }

    public function add(array $items)
    {
        $this->items=array_merge($this->items, $items);
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->items;
    }
}