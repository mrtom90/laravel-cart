<?php
/**
 * Created by EC-SOL.
 * Author: Pham Thai Duong
 * Date: 2016/03/31
 * Time: 15:44
 */

namespace Mrtom90\LaravelCart\Traits;


trait MetaData
{
    public function setMetaData($key, $input)
    {
        $data = [];

        if ($this->session->has('cart.metadata')) {
            $data = $this->session->get('cart.metadata');
        }

        array_set($data, $key, $input);

        $this->session->put('cart.metadata', $data);

        return $data;
    }

    public function getMetaData($key = null)
    {
        $data = $this->session->get('cart.metadata');
        if ($key == null) {
            return $data;
        }
        return array_get($data, $key);
    }

    public function removeMetaData($key = null)
    {
        if ($key == null) {
            $this->session->remove('cart.metadata');
            return;
        }
        $data = $this->session->get('cart.metadata');

        array_forget($data, $key);

        $this->session->put('cart.metadata', $data);

        return $data;
    }

}