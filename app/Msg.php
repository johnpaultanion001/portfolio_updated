<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    protected $table = 'msgs';
    public $primaryKey = 'id';
    public $timestamps = true;
}
