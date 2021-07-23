<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;

class Productss_controller extends Controller
{
    public function index()
    {
        $category = Category::all();
        
   
  
        return view('form', compact('category'));
            
    }

    public function sub(Request $request)
    {
           $parent_id = $request->id;
         

         
       // $data = Subcategory::select("subcategory.id","subcategory.subcategory")
    
    
    // ->where('subcategory.cat_id', '=',$parent_id )
    $data=Subcategory::select('subcategory','id')->where('cat',$request->id)->take(100)->get();
     
      //   $subcategories = Subcategory::where('cat_id',$parent_id)
                              
                     //->get();

     //   $subcategories =  DB::table('subcategory')->where('id', $parent_id)->get();



      return response()->json($data);
}


}
 