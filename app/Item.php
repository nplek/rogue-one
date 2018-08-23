<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ItemGroup;

class Item extends Model
{
    protected $primaryKey = ['ItemCode'];
    public $incrementing = false;
    protected $connection = 'kbuild';
    protected $table = 'OITM';
    public $timestamps = false;

    protected $visible = [
        'ItemCode', 
        'ItemName',
        'ItmsGrpCod',
        'FrgnName',
        'ItmsGrpCode',
        'LastPurPrc',
        'LastPurDat',
        'CreateDate',
        'UpdateDate',
        'Deleted',
        'BuyUnitMsr',
        'ItemType',
        'InvntItem',
        'SellItem',
        'PrchseItem',
        'AssetItem'
    ];

    public function scopeInventoryItem($query)
    {
        return $query->where('InvntItem', '=', 'Y');
    }

    public function scopePurchaseItem($query)
    {
        return $query->where('PrchseItem', '=', 'Y');
    }

    public function itemGroup(){
        return $this->belongsTo(ItemGroup::class,'DocEntry','DocEntry');
    }
}
