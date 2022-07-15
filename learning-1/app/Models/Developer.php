<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $table = 'developers';
    protected $primaryKey = 'id';

    public function getOffice(){
        return $this->belongsTo('App\Models\Office');
    }

}
