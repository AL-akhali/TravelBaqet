<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;



class Package extends Model 
{
    use HasFactory;


    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'days', 'image', 'is_active', 'location_id'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
public function requests()
{
    return $this->hasMany(PackageRequest::class);
}

}


