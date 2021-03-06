@extends('layouts.main')

@section('title', 'Products')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Brand</th>
            <th>Model</th>
	    <th>Image</th>
            <th></th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->brand}}</td>
                <td>{{$product->model}}</td>
		<td>
			@foreach($product->image as $image)
			      <a href="{{$image->get_path()}}">{{$image->get_title()}}</a> 
	                @endforeach
		</td> 
                <td><a href="" data-toggle="modal" data-dependence="product" data-id="{{$product->id}}" data-target="#image-upload-form" class="btn btn-danger btn-upload-image">Upload Image</a></td>
            </tr>
        @endforeach
    </table>

@include('modal.image-upload-form')

@endsection