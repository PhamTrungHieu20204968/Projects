@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
   
@endsection

@section('content')
    <h1>Đăng Nhập</h1>
    @if (session('msg'))
        <div class="alert alert-danger">
            {{session('msg')}}
        </div>
    @endif

    <form action="" method="POST" id="login_form">
        <div class="mb-3">
            <label for="">Tên đăng nhập</label>
            <input type="text" class="form-control" name="fullname" placeholder="Tên đăng nhập..." >
            @error('fullname')
               <span style="color:red">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" class="form-control" name="pass" placeholder="Mật Khẩu..." >
            @error('pass')
                <span style="color:red">{{$message}}</span>
            @enderror
        </div> 
        </div>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        @csrf
    </form>
@endsection

@section('js')
    
@endsection

            
            
            