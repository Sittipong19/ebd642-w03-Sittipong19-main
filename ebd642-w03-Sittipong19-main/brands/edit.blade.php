@extends('layout.master')
@section('title')
Edit Brand
@endsection
@section('content')
<div class="panel panel-default">
    {!! Form::model($brand, array('route' => 'brand.update','method' => 'post', 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="id" value="{{ $brand->id }}">
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
                <td>{{ Form::label('nameth', 'ชื่อสินค้า') }}</td>
                <td>{{ Form::text('nameth', Request::old('nameth'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('nameen', 'ราคาสินค้า') }}</td>
                <td>{{ Form::text('nameen', Request::old('nameen'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('logo', 'ต้นทุนสินค้า') }}</td>
                <td>{{ Form::text('logo', Request::old('logo'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('url', 'stock สินค้า') }}</td>
                <td>{{ Form::text('url', Request::old('url'), ['class' => 'form-control']) }}</td>
            </tr>            
        </table>
    </div>
    <div class="panel-footer">
      <button type="reset" class="btn btn-danger">ยกเลิก</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    {!! Form::close() !!}
</div>
@endsection