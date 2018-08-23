<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemGroup;
use App\Http\Resources\Item as ItemResource;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemGroup as ItemGroupResource;
use App\Http\Resources\ItemGroupCollection;

class ItemController extends Controller
{
    public function index(){
        $items = Item::inventoryItem()->paginate(20);
        if ($items){
            
        } else {
            return response()->json(['error'=>'Data not found'], 400);
        }
        return new ItemCollection($items);
    }

    public function findItemCode($itemcode){
        try {
            $item = Item::where('ItemCode', '=', $itemcode)->first();
            if ($item){
                return new ItemResource($item);  
            }
            return response()->json(['error'=>'Data not found'], 400);
        } catch (Exception $e){
            return response()->json(['error'=>$e->getMessage()], 400); 
        }
        
    }

    public function listItemGroup(){
        try {
            $itemgroups = ItemGroup::paginate(10);
            if ($itemgroups){
                return new ItemGroupCollection($itemgroups);
            }
            return response()->json(['error'=>'Data not found'], 400);
        } catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()], 400);
        }
    }

    public function findItemGroup($itemGroupCode){
        //
        try {
            $itemgroups = ItemGroup::id($itemGroupCode)->first();
            if ($itemgroups){
                return new ItemGroupResource($itemgroups);
            }
            return response()->json(['error'=>'Data not found'], 400);
        } catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()], 400);
        }
    }

    public function findItemGroupName($itemGroupName){
        try {
            $itemgroups = ItemGroup::name($itemGroupName)->first();
            if ($itemgroups){
                return new ItemGroupResource($itemgroups);
            }
            return response()->json(['error'=>'Data not found'], 400);
        } catch(Exception $e){
            return response()->json(['error'=>$e->getMessage()], 400);
        }
    }
}
