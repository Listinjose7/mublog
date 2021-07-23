<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;;
use App\Prod;
use App\Detail;
use App\Pack;



class Products extends Controller
{
   public function index() 
   { 
     $products = Prod::all();

     
     $packages = DB::table('Pack')
           ->select(array('pack.package_name','pack.package_id', DB::raw('COUNT(prod.prodct_id) as item_product')))
         ->join('detail', 'pack.package_id', '=', 'detail.d_package_id')
         ->join('prod', 'detail.d_product_id', '=', 'prod.prodct_id')
        ->groupBy('pack.package_id','pack.package_name')
         ->get();

   
     return view('package', compact('products','packages'));
}
public function store(Request $request)
{
   

     $rules = array(
            'package'    =>  'required',
            'product'     =>  'required',
            
        );
     $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }


    $data = new Pack;
    $data->package_name = $request->package;
$data->save();
$package_id = $data->id ;
;
            //GET ID PACKAGE
            $product =array();
            $product = $request->product;
             $result = array();
                foreach($product AS $val){
                    $result[] = array(
                    'd_package_id'   => $package_id,
                  'd_product_id'   => $val,
                 );
                    
               } 
            

 //$count = count($product);

    
        


        Detail::insert($result);

        return response()->json(['success' => 'Data Added successfully.']);
}
public function get_products(Request $request)
{

    
 $data = DB::table('Prod')
  ->select(array(DB::raw('prod.*')))
    ->join('detail', 'prod.prodct_id', '=', 'detail.d_product_id')
    ->join('pack', 'detail.d_package_id', '=', 'pack.package_id')
    ->where('pack.package_id', '=', $request->package_id)
    ->get();


           return response()->json($data);
}

public function update_product(Request $request)
{

$rules = array(
            'package_edit'    =>  'required',
            'product_edit'     =>  'required',
            
        );
     $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return redirect()->back()
                        ->with('error','Product erorr');
        }
      

 $formdata = array(
            'package_name' => $request->package_edit);
 $edit_id = $request->edit_id;
     

    Pack::wherepackage_id($edit_id)->update($formdata); 

    $datas=Detail::select('detail_id')->where('d_package_id', $request->edit_id)->take(100)->get();
    

    foreach($datas as $data){
 DB::table('Detail')->whereIn('detail_id',$data)->delete();
    }



    


            //GET ID PACKAGE
            $product =array();
            $product = $request->product_edit;
             $result = array();
                foreach($product AS $val){
                    $result[] = array(
                    'd_package_id'   => $edit_id,
                  'd_product_id'   => $val,
                 );
                }
                    
Detail::insert($result);

         return redirect()->back()
                        ->with('success','Product updated successfully');
   

}
public function delete_package(Request $request)
{
    $pack_id =$request->delete_id;
     DB::table('Detail')->where('d_product_id',$pack_id)->delete();
      DB::table('Pack')->where('package_id',$pack_id)->delete();
    return  redirect()->back();

}

}

