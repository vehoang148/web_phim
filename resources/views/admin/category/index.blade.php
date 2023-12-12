@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header"><h2>Quản lý danh mục</h2></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('category.create') }}">
                      @csrf
                      <a class="btn btn-primary" href="{{ route('category.create') }}">Thêm danh mục</a>
                    </form>

                    <table id="tablePhim" class="table table-striped">
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
                        @foreach ($list as $key => $cate)
                        <tr>
                          <th scope="row">{{ $key }}</th>
                          <td>{{ $cate->title }}</td>
                          <td>{{ $cate->slug }}</td>
                          <td>{{ $cate->description }}</td>
                          <td>
                            @if ($cate->status)
                            Hiển thị
                            @else
                            Không hiển thị
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-warning">Sửa</a>
                            <form method="POST" action="{{ route('category.destroy', $cate->id) }}" onsubmit="return confirm('Xóa?')">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="Xóa" class="btn btn-danger">
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
