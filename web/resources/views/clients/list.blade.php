@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    <h3>Homesidebar</h3>
@endsection

@section('content')
    <h1>Danh sách </h1>
    @if (session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
    @endif
    <a href="{{route('users.add')}}" class="btn btn-primary">ADD</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Image</th>
                <th width="5%">More</th>
                <th width="5%">Edit</th>
                <th width="5%">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($restaurantsList))
               @foreach ($restaurantsList as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->fullname}}</td>
                        <td>{{$item->phone}}</td>
                        <td><img src="{{asset('storage/'.$item->image)}}" alt="" style="height: 15%; width: 15%;"></td>
                        <td>
                            <a href="{{route('users.more',['id' => $item->id])}}" class="btn btn-success btn-sm">More</a>
                        </td>
                        <td>
                            <a href="{{route('users.edit',['id' => $item->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{route('users.delete',['id' => $item->id])}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
               @endforeach
                    
                @else
                    <tr>
                        <td colspan="7">Không có nhà hàng nào</td>
                    </tr>
                
            @endif
            
        </tbody>
    </table>
@endsection

@section('css')
    
@endsection