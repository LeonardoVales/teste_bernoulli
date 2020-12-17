<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    protected $table = 'classificacao';

    public function time()
    {
        return $this->hasOne(Time::class, 'id');
    }
}
