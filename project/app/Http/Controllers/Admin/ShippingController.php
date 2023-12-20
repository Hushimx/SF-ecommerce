<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Shipping;
use App\Models\Country;
use App\Models\City;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Shipping::all()->unique('title');        

         //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
                            ->editColumn('price', function(Shipping $data) {
                                $sign = Currency::where('is_default','=',1)->first();
                                $price = $sign->sign.$data->price;
                                return  $price;
                            })
                            ->addColumn('action', function(Shipping $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-shipping-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-shipping-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.shipping.index');
    }

    //*** GET Request
    public function create()
    {
        $countries = Country::all();
        $sign = Currency::where('is_default','=',1)->first();
        return view('admin.shipping.create',compact('countries', 'sign'));
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = ['title' => 'unique:shippings'];
        $customs = ['title.unique' => 'This title has already been taken.'];
        $validator = Validator::make(Input::all(), $rules, $customs);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section

        $input = $request->all();

        if ($file = $request->file('file'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/shipping',$name);
            $input['image'] = $name;
        }

        foreach($request->city_id as $key => $value) {
            
            $fnd = Shipping::where('country_id','=',(int)$value)->where('title','=',$request->title)->get()->count();

            if ($fnd == 0) {
                $data = new Shipping();
                $input['country_id'] = $value;
                $data->fill($input)->save();
            }
            
        }

        
        

        
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $countries = Country::all();
        $sign = Currency::where('is_default','=',1)->first();
        $data = Shipping::findOrFail($id);
        $city = City::where('id','=',$data->country_id)->first();
        $country = Country::where('id', '=', $city->country_id)->first();
        $cities = City::where('country_id','=',$country->id)->get();

        $shippings = DB::table('cities')
        ->join('shippings', 'cities.id' , '=', 'shippings.country_id')
        ->where('title','=',$data->title)
        ->where('cities.country_id','=',$country->id)
        ->get();

        return view('admin.shipping.edit',compact('countries', 'country','cities', 'shippings', 'data','sign'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        #"$rules = ['title' => 'unique:shippings,title,'.$id];
        #$customs = ['title.unique' => 'This title has already been taken.'];
        #$validator = Validator::make(Input::all(), $rules, $customs);
        
        /*if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }     */   
        //--- Validation Section Ends

        //--- Logic Section
        
        $input = $request->all();
        if ($file = $request->file('file'))
        {
            $name = time().$file->getClientOriginalName();
            $file->move('assets/images/shipping',$name);
            $input['image'] = $name;
        }

        $shipping = DB::table('cities')
        ->join('shippings', 'cities.id' , '=', 'shippings.country_id')
        ->where('title','=',$request->title)
        ->where('cities.country_id','=',$request->country_id)
        ->get();

        foreach($shipping as $key => $value) {
            $data1 = Shipping::where('id', '=', $value->id);
            $data1->delete();
        }


        foreach($request->city_id as $key => $value) {
            
            $data = new Shipping();
            $input['country_id'] = $value;
            $data->fill($input)->save();
            
        }
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Shipping::findOrFail($id);

        $city = City::where('id', '=', $data->country_id)->first();

        $country = Country::where('id', '=', $city->country_id)->first();

        $shippings = DB::table('cities')
        ->join('shippings', 'cities.id' , '=', 'shippings.country_id')
        ->where('title','=',$data->title)
        ->where('cities.country_id','=',$country->id)
        ->get();

        foreach($shippings as $key => $value) {
            $data = Shipping::where('id', '=', $value->id);
            $data->delete();
        }

        
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }

    public function getcity()
    {
        $country_id = $_GET['countryId'];
        $fnd = City::where('country_id','=',$country_id)->get()->count();
        $data['cities'] = [];
        if($fnd >= 1)
        {
            $data['cities'] = City::where('country_id','=',$country_id)->get();
        }  
        return response()->json($data);
        
    }
}