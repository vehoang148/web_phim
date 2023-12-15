@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Thêm quốc gia') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'country.store','method'=>'POST'])!!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', null, ['class'=>'form-control','placeholder'=>'Nhập dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Nhập dữ liệu...','id'=>'convert_slug']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Nhập dữ liệu...','id'=>'description']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status', []) !!}
                        {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'], null,['class'=>'form-control']) !!}
                    </div><br>

                    <div>
                    {!! Form::submit('Thêm quốc gia', ['class'=>'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection


