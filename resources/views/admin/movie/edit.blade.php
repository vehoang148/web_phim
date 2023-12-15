@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <a href="{{ route('movie.index') }}" class="btn btn-primary">Danh Sách Phim</a>
            <div class="card-header">Quản Lý Phim</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Tên phim', []) !!}
                    {!! Form::text('title', isset($movie) ? $movie->title : '', [
                        'class' => 'form-control',
                        'placeholder' => '...',
                        'id' => 'slug',
                        'onkeyup' => 'ChangeToSlug()',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Đường dẫn', []) !!}
                    {!! Form::text('slug', isset($movie) ? $movie->slug : '', [
                        'class' => 'form-control',
                        'placeholder' => '...',
                        'id' => 'convert_slug',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('thoiluong', 'Thời lượng', []) !!}
                    {!! Form::text('thoiluong', isset($movie) ? $movie->thoiluong : '', [
                        'class' => 'form-control',
                        'placeholder' => '...',
                        'id' => 'thoiluong',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name_eng', 'Tên tiếng anh', []) !!}
                    {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', [
                        'class' => 'form-control',
                        'placeholder' => '...',
                        'id' => 'name_eng',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Nội dung phim', []) !!}
                    {!! Form::textarea('description', isset($movie) ? $movie->description : '', [
                        'style' => 'resize:none',
                        'class' => 'form-control',
                        'placeholder' => '...',
                        'id' => 'description',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('sotap', 'Số tập', []) !!}
                    {!! Form::text('sotap', isset($movie) ? $movie->sotap : '', [
                        'class' => 'form-control',
                        'placeholder' => '...',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tags', 'Từ khóa', []) !!}
                    {!! Form::textarea('tags', isset($movie) ? $movie->tags : '', [
                        'style' => 'resize:none',
                        'class' => 'form-control',
                        'placeholder' => '...',
                        'id' => 'tags',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('trailer', 'Trailer', []) !!}
                    {!! Form::text('trailer', isset($movie) ? $movie->trailer : '', [
                        'class' => 'form-control',
                        'placeholder' => '...',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('quality', 'Chất lượng', []) !!}
                    {!! Form::select(
                        'quality',
                        ['0' => 'HD', '1' => 'SD', '2' => 'FullHD', '3' => '2k', '4' => '4K', '5' => 'Trailer'],
                        isset($movie) ? $movie->quality : '',
                        ['class' => 'form-control'],
                    ) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phude', 'Phụ đề', []) !!}
                    {!! Form::select('phude', ['0' => 'VietSub', '1' => 'Thuyết minh'], isset($movie) ? $movie->phude : '', [
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Trạng thái', []) !!}
                    {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ? $movie->status : '', [
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Category', 'Danh mục', []) !!}
                    {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', [
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Genre', 'Thể loại', []) !!}
                    @foreach ($list_genre as $key => $gen)
                        {!! Form::checkbox('genre[]', $gen->id, isset($movie_genre) && $movie_genre->contains($gen->id) ? true : false) !!}
                        {!! Form::label('genre', $gen->title) !!}
                    @endforeach
                </div>
                <div class="form-group">
                    {!! Form::label('Country', 'Quốc gia', []) !!}
                    {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phimhot', 'Phim hot', []) !!}
                    {!! Form::select('phim_hot', ['1' => 'Hot', '0' => 'Không hot'], isset($movie) ? $movie->phim_hot : '', [
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('thuocphim', 'Thuộc phim', []) !!}
                    {!! Form::select('thuocphim', ['phimle' => 'Phim lẻ', 'phimbo' => 'Phim bộ'], isset($movie) ? $movie->thuocphim : '', [
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Image', 'Hình ảnh', []) !!}
                    {!! Form::file('image', ['class' => 'form-control-file']) !!}
                    @if (isset($movie))
                        <img width="150" src="{{ asset('uploads/movie/' . $movie->image) }}">
                    @endif
                </div>
                {!! Form::submit('Cập Nhật Phim', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
