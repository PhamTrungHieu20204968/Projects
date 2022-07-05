@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
   <img src="{{asset('storage/'.session('image'))}}" alt="">
@endsection

@section('content')
    <h1>Chi tiết Nhà Hàng </h1>
    @error('msg')
        <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <form action="" method="POST" id="restaurant_form">
        <div class="mb-3">
            <h4 for="">Tên nhà hàng: {{$restaurantDetail->fullname}}</h4>
            
            
        </div>
        <div class="mb-3">
            <h4 for="">Số điện thoại: {{$restaurantDetail->phone}}</h4>
        </div>
        <div class="mb-3">
            <h4 for="">Địa chỉ: {{$restaurantDetail->Address}}</h4>
        </div>
          
        <a href="{{route('users.index')}}" class="btn btn-warning">Back</a>
        @csrf
    </form>
@endsection


@section('css')
    <style>
        img{
            max-width: 65%;
            height: auto;
        }
    </style>
@endsection

@section('js')
    
@endsection

            
            
            