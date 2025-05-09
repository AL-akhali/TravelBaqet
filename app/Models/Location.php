<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ['name', 'country'];

    public function packages()
{
    return $this->hasMany(Package::class);
}

}
