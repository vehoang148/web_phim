@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2>Quản lý phim</h2>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="GET" action="{{ route('movie.create') }}">
                    @csrf
                    <a class="btn btn-primary" href="{{ route('movie.create') }}">Thêm phim</a>
                </form>
                <table id="tablePhim" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Đường dẫn</th>
                            <th scope="col">Thời lượng</th>
                            <th scope="col">Tên tiếng anh</th>
                            <th scope="col">Chất lượng</th>
                            <th scope="col">Trailer</th>
                            <th scope="col">Phụ đề</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Phim hot</th>
                            <th scope="col">Thuộc phim</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Quốc gia</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Số tập</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Năm</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $key => $movie)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $movie->title }}</td>
                                <td><img width="100" src="{{ asset('uploads/movie/' . $movie->image) }}"></td>
                                <td>{{ $movie->slug }}</td>
                                <td>{{ $movie->thoiluong }}</td>
                                <td>{{ $movie->name_eng }}</td>
                                <td>
                                    @if ($movie->quality == 0)
                                        HD
                                    @elseif ($movie->quality == 1)
                                        SD
                                    @elseif ($movie->quality == 2)
                                        FullHD
                                    @elseif ($movie->quality == 3)
                                        2K
                                    @elseif ($movie->quality == 4)
                                        4K
                                    @else
                                        Trailer
                                    @endif
                                </td>
                                <td>{{ $movie->trailer }}</td>
                                <td>
                                    @if ($movie->phude == 0)
                                        Vietsub
                                    @elseif ($movie->phude == 1)
                                        Thuyết Minh
                                    @endif
                                </td>

                                <td>
                                    <select name="status" class="form-control status_choose" id="{{ $movie->id }}">
                                        <option value="">Select Status</option>
                                        @foreach ($movie as $key => $value)
                                            <option value="{{ $key }}"
                                                @if (isset($movie) && $movie->status == $key) selected @endif>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                {{-- @if ($movie->status)
                                        Hiển thị
                                    @else
                                        Không hiển thị
                                    @endif --}}

                                <td>
                                    @if ($movie->phim_hot)
                                        Hot
                                    @else
                                        Không hot
                                    @endif
                                </td>
                                <td>
                                    @if ($movie->thuocphim == 'phimle')
                                        Phim lẻ
                                    @else
                                        Phim bộ
                                    @endif
                                </td>
                                <td>
                                    {!! Form::select('category_id', $category, isset($movie) ? $movie->category->id : '', [
                                        'class' => 'form-control category_choose',
                                        'id' => $movie->id,
                                    ]) !!}
                                </td>
                                <td>
                                    {!! Form::select('country_id', $country, isset($movie) ? $movie->country->id : '', [
                                        'class' => 'form-control country_choose',
                                        'id' => $movie->id,
                                    ]) !!}
                                </td>
                                <td>
                                    @foreach ($movie->movie_genre as $mov_gen)
                                        <button class="btn btn-dark"> {{ $mov_gen->title }}</button>
                                    @endforeach
                                </td>


                                <td>{{ $movie->sotap }}</td>
                                <td>{{ $movie->tags }}</td>
                                <td>{{ $movie->description }}</td>
                                <td>{{ $movie->ngaytao }}</td>
                                <td>{{ $movie->ngaycapnhat }}</td>
                                <td>
                                    {!! Form::selectYear('year', 2000, 2024, '', ['class' => 'select-year', 'id' => $movie->id]) !!}
                                </td>
                                <td>
                                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning">Sửa</a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['movie.destroy', $movie->id],
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
