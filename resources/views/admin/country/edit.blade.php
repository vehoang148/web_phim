@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ __('Sửa quốc gia') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}

                    <div class="form-group">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', isset($country)? $country->title :'', ['class'=>'form-control','placeholder'=>'Nhập dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', isset($country)? $country->slug :'', ['class'=>'form-control','placeholder'=>'Nhập dữ liệu...','id'=>'convert_slug']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description',  isset($country)? $country->description :'', ['class'=>'form-control','placeholder'=>'Nhập dữ liệu...','id'=>'description']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status', []) !!}
                        {!! Form::select('status', ['1'=>'Hiển thị','0'=>'Không'], $country->status,['class'=>'form-control']) !!}
                    </div><br>

                    <div>
                    {!! Form::submit('Sửa quốc gia', ['class'=>'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection


