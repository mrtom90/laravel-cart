<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/31
 * Time: 14:04
 */

namespace Mrtom90\LaravelCart\Collection;


class CartRowExtendsCollection extends Collection
{
    public function __construct($items)
    {
        parent::__construct($items);
    }

    public function __get($arg)
    {
        if ($this->has($arg)) {
            return $this->get($arg);
        }

        return NULL;
    }

    public function search($search, $strict = false)
    {
        foreach ($search as $key => $value) {
            $found = ($this->{$key} === $value) ? true : false;

            if (!$found) return false;
        }

        return $found;
    }

}