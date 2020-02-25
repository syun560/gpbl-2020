<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // calculate age
    function getAge() {
        $now = (int)date("Ymd");
        $birthday = (int)str_replace("-", "", $this->birthday); // Remove hyphens
        return floor(($now-$birthday)/10000);
    }
}