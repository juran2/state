<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    //
    protected $fillable = [
        'program', 'game', 'name','process','description','picurl','createby','sendby','doby','starttime','endtime','status','records'
    ];
}
