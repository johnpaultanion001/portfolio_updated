<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_info extends Model
{
    protected $table = 'personal_infos';
    public $primaryKey = 'id';
    public $timestamps = true;
}
