<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactinfo extends Model
{
    protected $fillable = [
        'category_id',
        'valueofcontact',
        
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
