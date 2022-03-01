<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index(){
        $products=Product::OrderBy('id','asc')->paginate(10);
        return view('products.product',compact('products'));
    }
    public function edit($id = null) {
        $categorys = Category::pluck('name', 'id')->prepend('เลือกรายการ', '');
        if($id) {
            $product = Product::where('id', $id)->first();
            return view('products.edit')
                ->with('product',$product)
                ->with('categorys',$categorys);
        } else {
            return view('products.add')
            ->with('categorys',$categorys);
        }
    
    }
    public function update(Request $request) {
        $rules = array(
            'name' => 'required',
            'unit_price' => 'numeric',
            'cost_price' => 'numeric',
            'img_path'=>'required',
            'stock_qty'=>'numeric',
           
            
        );
        $messages = array(
            'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
            'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',
        );
        $id = $request->input('id');
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('product/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');
        $product->cost_price = $request->input('cost_price');
        $product->category_id = $request->input('category_id');
        $product->stock_qty = $request->input('stock_qty');
        $product->img_path = $request->input('img_path');
        $product->save();
        return redirect('product')
            ->with('ok', true)
            ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    
    }
    public function insert(Request $request) {
        $rules = array(
            'name' => 'required',
            'unit_price' => 'numeric',
            'cost_price' => 'numeric',
            'img_path'=>'required',
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
        $product = new Product();
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');
        $product->cost_price = $request->input('cost_price');
        $product->category_id = $request->input('category_id');
        $product->stock_qty = $request->input('stock_qty');
        $product->img_path = $request->input('img_path');
        $product->save();
        return redirect('product')
            ->with('ok', true)
            ->with('msg', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
    }
    public function search(Request $request) {
        $query = $request->input('q');
        if($query) {
            $products = Product::where('ttl_id', 'like', '%'.$query.'%')
                ->orWhere('ttl_id', 'like', '%'.$query.'%')
                ->paginate($this->rp);

        } else {
            $products = Product::paginate($this->rp);
        }
        return view('products.product', compact('products'));

    }

    public function remove($id) {
        product::find($id)->delete();
        return redirect('product')
            ->with('ok', true)
            ->with('msg', 'ลบข้อมูลสำเร็จ');
    }   

}
