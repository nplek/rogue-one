<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $primaryKey = ['WhsCode'];
    public $incrementing = false;
    protected $connection = 'kbuild';
    protected $table = 'OWHS';
    public $timestamps = false;

    protected $visible = [
        'WhsCode', 
        'WhsName',
        'createDate',
        'updateDate',
    ];
}
