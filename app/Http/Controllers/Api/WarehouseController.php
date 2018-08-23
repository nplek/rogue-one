<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Warehouse;
use App\Http\Resources\Warehouse as WarehouseResource;
use App\Http\Resources\WarehouseCollection;

class WarehouseController extends Controller
{
    public function index(){
        $whs = Warehouse::paginate(50);
        if ($whs){
            return new WarehouseCollection($whs);
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
    }

    public function findWhsCode($whscode){
        try {
            $whs = Warehouse::where('WhsCode', '=', $whscode)->first();
            if ($whs){
                return new WarehouseResource($whs);  
            }
            return response()->json(['error'=>'Data not found'], 400);
        } catch (Exception $e){
            return response()->json(['error'=>$e->getMessage()], 400); 
        }
        
    }
}
