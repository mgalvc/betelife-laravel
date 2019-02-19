<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getActive($value) {
        return $value;
    }
}
