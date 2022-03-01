@extends("layouts.master")
@section('title') BikeShop | แก้ไขข้อมูลสินค้า @stop
@section('content')
<div class="panel panel-default">
    {!! Form::model($product, array('action' => 'ProductController@update','method' => 'post', 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="id" value="{{ $product->id }}">
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
    </div>
    @endif

    <div class="panel-heading">
        <div class="panel-title"><strong>ข้อมูลสินค้า</strong></div>
    </div>
    <div class="panel-body">
        <table>
            <tr>
                <td>{{ Form::label('name', 'ชื่อสินค้า') }}</td>
                <td>{{ Form::text('name', Request::old('name'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('unit_price', 'ราคาสินค้า') }}</td>
                <td>{{ Form::text('unit_price', Request::old('unit_price'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('cost_price', 'ต้นทุนสินค้า') }}</td>
                <td>{{ Form::text('cost_price', Request::old('cost_price'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('stock_qty', 'ราคาสินค้า') }}</td>
                <td>{{ Form::text('stock_qty', Request::old('stock_qty'), ['class' => 'form-control']) }}</td>
            </tr>            
            <tr>
                <td>{{ Form::label('category_id', 'ประเภทสินค้า') }}</td>
                <td>{{ Form::select('category_id',$categorys, Request::old('category_id'), ['class' => 'form-control']) }}</td>
            </tr>
        </table>
    </div>
    <div class="panel-footer">
      <button type="reset" class="btn btn-danger">ยกเลิก</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    {!! Form::close() !!}
</div>

@stop
