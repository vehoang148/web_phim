@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <a href="{{ route('episode.index') }}" class="btn btn-primary">Danh Sách Phim</a>
            <div class="card-header">Quản Lý tập phim</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT']) !!}


                {!! Form::open(['route' => 'episode.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('movie_id', 'Tên phim', []) !!}
                    {!! Form::select('movie_id',  ['0'=>'Chọn phim','Phim mới nhất'=>$list_movie],isset($episode) ? $episode->movie_id : '', ['class' => 'form-control select-movie']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('link', 'Link phim', []) !!}
                    {!! Form::text('link', isset($episode) ? $episode->linkphim : '', ['class' => 'form-control', 'placeholder' => '.....']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('episode', 'Tập phim', []) !!}
                    <select name="episode" id="show_movie" class="form-control">

                </select>

                </div>
                {!! Form::submit('Cập Nhật Phim', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
