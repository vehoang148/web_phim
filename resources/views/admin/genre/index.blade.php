@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header"><h2>Quản lý thể loại</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('genre.create') }}"> 
                      @csrf
                      <a class="btn btn-primary" href="{{ route('genre.create') }}">Thêm thể loại</a>
                    </form>
                    <table class="table table-striped" style="width:100%" id="tablePhim">                        
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Manage</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $gen)
                          <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$gen->title}}</td>
                            <td>{{$gen->slug}}</td>
                            <td>{{$gen->description}}</td>
                            <td> @if($gen->status)
                                Hiển thị
                                @else
                                Không hiển thị
                                @endif</td>
                            <td>
                                <a href="{{route('genre.edit', $gen->id)}}" class="btn btn-warning">Sửa</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['genre.destroy',$gen->id],'onsubmit'=>'return confirm("Xóa?")']) !!}   
                                {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}
                               
                            </td>
                    </tr> 
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>

@endsection
