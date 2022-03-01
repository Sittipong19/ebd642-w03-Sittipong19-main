<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    //
    public function index(){
        $brands=Brand::OrderBy('id','asc')->paginate(10);
        return view('brands.brand',compact('brands'));
    }
    public function add(){
        return view('brands.add');
    }
    public function edit($id = null) {
        
        if($id) {
            $brand = Brand::where('id', $id)->first();
            return view('brands.edit')
                ->with('brand',$brand);
                
        } else {
            return view('brands.add');
        }
    
    }
    public function update(Request $request) {
        $rules = array(
            'nameen' => 'required',
            'nameth' => 'required',
            'logo' => 'required',
            'url'=>'required',

           
            
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',
        );
        $id = $request->input('id');
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('brand/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        $brand =Brand::find($id);
        $brand->nameen = $request->input('nameen');
        $brand->nameth = $request->input('nameth');
        $brand->logo= $request->input('logo');
        $brand->url = $request->input('url');
        $brand->save();
        return redirect('brand')
            ->with('ok', true)
            ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    
    }
    public function insert(Request $request) {
        $rules = array(
            'nameen' => 'required',
            'nameth' => 'required',
            'logo' => 'required',
            'url'=>'required',
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',
        );
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('product/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $brand =new Brand();
        $brand->nameen = $request->input('nameen');
        $brand->nameth = $request->input('nameth');
        $brand->logo= $request->input('logo');
        $brand->url = $request->input('url');
        $brand->save();
        return redirect('brand')
            ->with('ok', true)
            ->with('msg', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }
    public function search(Request $request) {
        $query = $request->input('q');
        if($query) {
            $products = Brand::where('ttl_id', 'like', '%'.$query.'%')
                ->orWhere('ttl_id', 'like', '%'.$query.'%')
                ->paginate($this->rp);

        } else {
            $brands = Brand::paginate($this->rp);
        }
        return view('brands.brand', compact('brands'));

    }

    public function remove($id) {
        Brand::find($id)->delete();
        return redirect('brand')
            ->with('ok', true)
            ->with('msg', 'ลบข้อมูลสำเร็จ');
    }   

}
