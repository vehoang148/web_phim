@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2>Quản lý tập phim</h2>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="GET" action="{{ route('episode.create') }}">
                    @csrf
                    <a class="btn btn-primary" href="{{ route('episode.create') }}">Thêm phim</a>
                </form>
                <table id="tablePhim" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Link phim</th>
                            <th scope="col">Tập phim</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movie_episode as $key => $movi)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $movi->movie->title }}</td>
                                <td>{!! $movi->linkphim !!}</td>
                                <td>{{ $movi->episode }}</td>

                                <td>
                                    <a href="{{ route('episode.edit', $movi->id) }}" class="btn btn-warning">Sửa</a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['episode.destroy', $movi->id],
                                        'onsubmit' => 'return confirm("Xóa?")',
                                    ]) !!}
                                    {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
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
