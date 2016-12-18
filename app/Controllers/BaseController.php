<?php

namespace  App\Controllers;

use Valitron\Validator as Valitron;

class BaseController
{
    /**
     * @param $data
     * @param $rules
     * @param $labels
     * @return array|bool
     */
    public function validate($data, $rules, $labels)
    {
        $valitron = new Valitron($data);
        $valitron->rules($rules);
        $valitron->labels($labels);

        if (!$valitron->validate()) {
            $collection = collection($valitron->errors());
            return $collection->flatten()->all();
        }
        return false;
    }
}
