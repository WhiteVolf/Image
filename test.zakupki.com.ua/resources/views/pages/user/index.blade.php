@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
	    <th></th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
		<td>
			@foreach($user->image as $image)
			      <a href="{{$image->get_path()}}">{{$image->get_title()}}</a> 
	                @endforeach
		</td> 
                <td><a href="" data-toggle="modal" data-dependence="user" data-id="{{$user->id}}" data-target="#image-upload-form" class="btn btn-success btn-upload-image">Upload Image</a></td>

            </tr>
        @endforeach
    </table>


@include('modal.image-upload-form')

@endsection