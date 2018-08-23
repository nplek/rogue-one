<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    protected $primaryKey = ['ItmsGrpCod'];
    public $incrementing = false;
    protected $connection = 'kbuild';
    protected $table = 'OITB';
    public $timestamps = false;

    protected $visible = [
        'ItmsGrpCod',
        'ItmsGrpNam',
        'Locked',
        'ExpensesAc',
        'InvntSys',
        'PlaningSys',
    ];

    public function items(){
        return $this->hasMany(Item::class,'ItmsGrpCod','ItmsGrpCod');
    }

    public function scopeId($query,$id)
    {
        return $query->where('ItmsGrpCod', '=', $id);
    }

    public function scopeName($query,$name)
    {
        return $query->where('ItmsGrpNam', '=', $name);
    }
}
