@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
   <img src="{{asset('storage/'.session('image'))}}" alt="">
@endsection

@section('content')
    <h1>Sửa Nhà Hàng </h1>
    @error('msg')
        <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <form action="{{route('users.post-edit')}}" method="POST" id="restaurant_form">
        <div class="mb-3">
            <label for="">Tên nhà hàng</label>
            <input type="text" class="form-control" name="fullname" placeholder="Tên nhà hàng..." value="{{old('fullname') ?? $restaurantDetail->fullname}}">
            @error('fullname')
               <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại..." value="{{old('phone')?? $restaurantDetail->phone}}">
            @error('phone')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" name="Address" placeholder="Địa chỉ..." value="{{old('Address') ?? $restaurantDetail->Address}}">
            @error('Address')
                <span style="color:red">{{$message}}</span>
             @enderror
        </div>
        <div  class="mb-3">
            <label for="">Chọn ảnh</label>
            <input type="file" class="form-control" name="image" placeholder="Chọn file..." value="{{old('image') ?? $restaurantDetail->image}}">
            @error('image')
                <span style="color:red">{{$message}}</span>
             @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
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

            
            
            