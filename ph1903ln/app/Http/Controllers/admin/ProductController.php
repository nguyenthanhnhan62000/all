<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

use App\Http\Controllers\controller;

class ProductController extends Controller
{
    public function index()
    {
        // $cats = product::all();
        $products = product::all();
    
        return view('admin/product/index', [         
            'products' => $products
        ]);
    }
    public function edit($id)
    {
        $cats =  category::all();
        $model = product::find($id);
        return view('admin/product/edit',[
            'model'=>$model,
            'cats'=>$cats
        ]);
    }

    public function show($id)
    {
        $model = product::find($id);

        return view('admin/product/show',['model'=>$model]);
    }

  
    public function destroy($id)
    {
        $cat = product::find($id)->delete();
        return redirect()->back();
    }

    public function create()
    {
        $cats = category::all();
        // dd($cats);
        return view('admin/product/add',compact('cats'));
    }

    public function store(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'sale_price' => 'required|min:0|lt:price',
        ],[
            'name.required' => 'không được để trống Name',
            'slug.required' => 'không được để trống Slug',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'price.not_in' => 'không được là 0',
            'price.min' => 'phải lớn hơn 0'

        ]);

        // $img = str_replace(url('uploads').'/','',$request->image);

        // $request->merge(['image' => $img]);

        product::create($request->all());
        return redirect()->route('product.index');
    }

    public function update($id,Request $request)
    {   

        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'slug' => 'required',
            'category_id' =>'required',
            'price' => 'required|numeric|min:0|not_in:0',
            'sale_price' => 'required|min:0|lt:price',
        ],[
            'name.required' => 'không được để trống Name',
            'slug.required' => 'không được để trống Slug',
            'sale_price.lt' => 'Giá khuyến mãi phải nhỏ hơn giá gốc',
            'price.not_in' => 'không được là 0',
            'price.min' => 'phải lớn hơn 0'

        ]);

       $request->offsetUnset('_token');
       $request->offsetUnset('_method');

       product::where('id',$id)->update($request->all());

       return redirect()->route('product.index');
    }
   
   
    

}
