<?php


namespace App\Models;


class BaseModel
{
    public function __construct($object) {
        foreach($object as $property => $value) {
            $this->$property = $value;
        }
    }
}