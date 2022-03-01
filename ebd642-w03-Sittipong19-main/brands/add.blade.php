@extends('layout.master')
@section('title')
Add Brand
@endsection
@section('content')
<div>
{!! Form::open(array('route' => 'brand.insert', 'method'=>'post', 'enctype' => 'multipart/form-data')) !!}
@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
    </div>
    @endif

    <div class="panel-heading">
        <div class="panel-title"><h3>เพิ่มข้อมูล Brand</h3></div>
    </div>
    <div class="panel-body">
        <table>
            <tr>
                <td>{{ Form::label('nameth', 'Thai Name') }}</td>
                <td>{{ Form::text('nameth', Request::old('nameen'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('nameen', 'ENG Name') }}</td>
                <td>{{ Form::text('nameen', Request::old('nameth'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('logo', 'Img') }}</td>
                <td>{{ Form::text('logo', Request::old('img'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('ul', 'URL') }}</td>
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