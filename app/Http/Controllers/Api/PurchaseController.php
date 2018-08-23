<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseOrder;
use App\PurchaseItem;
use App\Http\Resources\PurchaseOrder as PurchaseOrderResource;
use App\Http\Resources\PurchaseOrderCollection;
use App\Http\Resources\PurchaseOrderItem as PurchaseItemResource;
use App\Http\Resources\PurchaseOrderItemCollection;

class PurchaseController extends Controller
{
    public function __construct() {
        //$this->middleware('permission:system-list',['only' => 'index','show']);
        //$this->middleware('auth:api');
    }

    public function index(){
        $purchases = PurchaseOrder::paginate(20);
        if ($purchases){
            return new PurchaseOrderCollection($purchases);
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
        
    }

    public function findDocnum($docnum){
        $purchase = PurchaseOrder::where('DocNum', $docnum)->first();

        if ($purchase){
            return new PurchaseOrderResource($purchase);
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
        
    }

    public function findPOByProject($project){
        $purchase = PurchaseOrder::where('Project', $project)
                        ->paginate(20);
        if ($purchase){
            return new PurchaseOrderCollection($purchase);
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
        
    }

    public function findPOByDocnumProject($docnum, $project){
        $purchase = PurchaseOrder::where('DocNum',$docnum)
                        ->where('Project', $project)
                        ->first();
        if ($purchase){
            return new PurchaseOrderResource($purchase);
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
        
    }

    public function findPOItemByDocnum($docnum){
        $purchase = PurchaseOrder::where('DocNum',$docnum)->first();
        if ($purchase){
            return new PurchaseItemResource($purchase->purchaseitems);
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
    }
}
