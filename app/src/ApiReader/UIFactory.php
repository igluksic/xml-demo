<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 3/28/2019
 * Time: 8:50 PM
 */

namespace App\src\ApiReader;

class UIFactory
{
    protected $data;
    protected $dataErrors;

    public function __construct($data)
    {
        $this->data = $data;
        $this->dataErrors = 0;
    }

    public function getFormatedData()
    {
        $this->checkErrors();
        return json_decode($this->data, true);
    }

    /**
     * Placeholder for Json validation
     * TODO checker / validator
     */
    public function checkErrors()
    {
        return 0;
    }
}