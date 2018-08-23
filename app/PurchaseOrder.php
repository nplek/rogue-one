<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $primaryKey = 'DocEntry';
    protected $connection = 'kbuild';
    //
    protected $table = 'OPOR';
    public $timestamps = false;
    protected $visible = [
        'DocEntry', 'DocNum','DocType','CANCELED',
        'Printed','DocStatus','DocDate','DocDueDate','TaxDate',
        'CardCode','CardName','Address','NumAtCard',
        'Ref1','Ref2','Comments','Confirmed',
        'Project','DocTotal','DocTotalSy',
        'UpdateDate','CreateDate','Series',
        'U_NEC_VERIFY','U_NEC_Approved','U_NEC_PR_NO','U_NEC_Quotation'
    ];

    public function purchaseorderitems(){
        return $this->hasMany(PurchaseOrderItem::class,'DocEntry','DocEntry');
    }
}
