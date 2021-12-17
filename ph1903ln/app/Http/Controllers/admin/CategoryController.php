<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Controllers\controller;

class CategoryController extends Controller
{
    public function index()
    {
        // $cats = category::all();
        $cats = category::all();
    
        return view('admin/category/index', [
            'name' => 'nhan',
            'cats' => $cats
        ]);
    }
    public function edit($id)
    {
        $model = category::find($id);
        return view('admin/category/edit',['model'=>$model]);
    }

  
    public function destroy($id)
    {
        $cat = category::find($id)->delete();
        return redirect()->back();
    }

    public function create()
    {
        $category = Category::where('parent_id',0)->get();
        return view('admin/category/add',compact('category'));
    }

    public function store(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required|unique:category,name' 
        ],[
            'name.required' => 'không được để trống Name',
            'name.unique' => 'Tên danh mục đã có'
        ]);

        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function update($id,Request $request)
    {   

       $this->validate($request,[
           'name' => 'required' 
       ],[
           'name.required' => 'không được để trống Name'
       ]);
       $request->offsetUnset('_token');
       $request->offsetUnset('_method');
    //    dd($request->only('name','status')); 
       Category::where('id',$id)->update($request->all());

       return redirect()->route('category.index');
    }
   
   
    

}
