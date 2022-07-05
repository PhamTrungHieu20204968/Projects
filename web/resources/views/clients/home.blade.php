@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('sidebar')
    <h3>Wellcome</h3>
@endsection

@section('content')
    <h1>Trang Chủ </h1>
    @if (session('msg'))
        <div class="alert alert-info">
            {{session('msg')}}
        </div>
    @endif
    {{-- <x-package-alert/> --}}

    {{-- <p><img src="https://scontent.fhan5-6.fna.fbcdn.net/v/t39.30808-6/279214827_1417694212007022_870864436667159097_n.jpg?stp=dst-jpg_p843x403&_nc_cat=105&ccb=1-6&_nc_sid=8bfeb9&_nc_ohc=PfI0pywqgUIAX_N69Ne&_nc_ht=scontent.fhan5-6.fna&oh=00_AT_C3kecSk2KAYxIRL6fm2N8IuJXjgFr8S1gpOClbfQDDg&oe=627D92C8" alt=""></p>

    <p><a href="{{route('download-Image').'?image='.public_path('storage/image/279214827_1417694212007022_870864436667159097_n.jpg')}}" class="btn btn-primary"> download</a></p> --}}

        
        <div class="container py-5">
            <a href="{{route('users.index')}}" class="btn btn-success btn-sm ">List</a>
        </div>
        

      
@endsection

@section('css')
    <style>
        img{
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('js')
    
@endsection

@push('scripts')
    {{-- <script>
        console.log('1');
    </script> --}}
@endpush