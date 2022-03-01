@extends('layouts.master')

@section('title')Prodcut
    
@endsection

@section('content')
<a href="{{ URL::to('product/edit') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Category</th>
                <th>Unit price</th>
                <th>Stock Quantity</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
            <tr>
                <td scope="row">{{ $p->img_path}}</td>
                <td>{{ $p->name}}</td>
                <td>{{ $p->category->name}}</td>
                <td>{{ $p->unit_price}}</td>
                <td>{{ $p->stock_qty}}</td>
                <td>
                    <a href="{{ URL::to('product/edit/'.$p->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> แก้ไข</a>                
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection