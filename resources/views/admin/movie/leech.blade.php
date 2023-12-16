@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2>Quản lý phim Api</h2>
            </div>
            <div class="card-body">

                <table id="tablePhim" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Tên tiếng anh</th>
                            <th scope="col">Ảnh </th>
                            <th scope="col">Ảnh chính thức</th>
                            <th scope="col">Năm</th>
                            <th scope="col">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resp['items'] as $key => $rep)
                            <tr>
                                <th scope="row">{{ $key }}</th>
                                <td>{{ $rep['name'] }}</td>
                                <td>{{ $rep['slug'] }}</td>
                                <td>{{ $rep['origin_name'] }}</td>
                                <td><img src="{{ $resp['pathImage'] . $rep['thumb_url'] }}" height="80px" width="80px">
                                </td>
                                <td><img src="{{ $resp['pathImage'] . $rep['poster_url'] }}"height="80px" width="80px">
                                </td>
                                <td>{{ $rep['year'] }}</td>
                                <td><a href="{{ route('leech-detail', $rep['slug']) }}" class="btn btn-primary">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
