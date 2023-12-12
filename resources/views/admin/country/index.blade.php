@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header"><h2>Quản lý quốc gia</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('country.create') }}"> 
                      @csrf
                      <a class="btn btn-primary" href="{{ route('country.create') }}">Thêm quốc gia</a>
                    </form>
                    <table id="tablePhim" class="table table-striped" style="width:100%">    
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
                        @foreach ($list as $key => $coun)
                          <tr>
                            <th scope="row">{{$key}}</th>
                            <td>{{$coun->title}}</td>
                            <td>{{$coun->slug}}</td>
                            <td>{{$coun->description}}</td>
                            <td> @if($coun->status)
                                Hiển thị
                                @else
                                Không hiển thị
                                @endif</td>
                            <td>
                                <a href="{{route('country.edit', $coun->id)}}" class="btn btn-warning">Sửa</a>
                                {!! Form::open(['method'=>'DELETE','route'=>['country.destroy',$coun->id],'onsubmit'=>'return confirm("Xóa?")']) !!}   
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
</div>
@endsection
