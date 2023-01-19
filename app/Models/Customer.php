<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "customers";
    protected $primaryKey = "id";

    // mutator 
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = ucwords($name);
    }

    // accessor
    public function getDobAttribute($date)
    {
        if ($date) {
            return date('d-M-Y', strtotime($date));
        } else {
            return null;
        }
    }
}
