@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
   
@endsection

@section('content')
    <h1>Thêm Nhà Hàng </h1>
    @error('msg')
        <div class="alert alert-danger text-center">{{$message}}</div>
    @enderror

    <form action="" method="POST" id="restaurant_form">
        <div class="mb-3">
            <label for="">Tên nhà hàng</label>
            <input type="text" class="form-control" name="fullname" placeholder="Tên nhà hàng..." value="{{old('fullname')}}">
            @error('fullname')
               <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại..." value="{{old('phone')}}">
            @error('phone')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Địa chỉ</label>
            <input type="text" class="form-control" name="Address" placeholder="Địa chỉ..." value="{{old('Address')}}">
            @error('Address')
                <span style="color:red">{{$message}}</span>
             @enderror
        </div>
        <div  class="mb-3">
            <label for="">Chọn ảnh</label>
            <input type="file" class="form-control" name="image" placeholder="Chọn file..." value="{{old('image')}}">
            @error('image')
                <span style="color:red">{{$message}}</span>
             @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary">submit</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Back</a>
        @csrf
    </form>
@endsection

@section('js')
    
@endsection

            
            
            