@extends('layout.master')
@section('title')
Brands
@endsection
@section('content')
@if($brands)
<h3 class="text-center">Brand Boards</h3>
<a class="btn btn-primary" href="{{ URL::to('brand/add') }}">Add</a>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Thai Name</th>
                <th scope="col">ENG Name</th>
                <th scope="col">Img</th>
                <th scope="col">Url</th>
                <th span='col-2'></th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $b)
            <tr>
                <td>{{$b->id}}</td>
                <td>{{$b->nameth}}</td>
                <td>{{$b->nameen}}</td>
                <td>{{$b->logo}}</td>
                <td>{{$b->url}}</td>
                <td><a class="btn btn-warning" href="{{ URL::to('brand/edit/'.$b->id) }}">Edit</a><a class="btn btn-danger" href="{{ URL::to('brand/remove/'.$b->id) }}">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$brands->links()}}
</div>
@endif
@endsection