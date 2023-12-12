<form action="{{ route('locphim') }}" method="GET">
    <style type="text/css">
        .style_filter {
            border: 0;
            background: #12171b;
            color: #fff;
        }

        .style_button_filter {
            border: 0 #b2b71b;
            background: #12171b;
            color: #fff;
            padding: 7px;
        }
    </style>
    <div class="col-md-2">
        <div class="form-group ">
            <select class="form-control style_filter" name="order" id="exampleFormControlSelect1">
                <option>Sắp Xếp</option>
                <option value="date">Ngày đăng</option>
                <option value="year">Năm sản xuất</option>
                <option value="title">Tên phim</option>
                <option value="topview">Lượt xem</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control style_filter" name="genre" id="exampleFormControlSelect1">
                <option>Thể loại</option>
                @foreach ($genre as $key => $gen)
                    <option>{{ $gen->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control style_filter" name="country" id="exampleFormControlSelect1">
                <option>Quốc Gia</option>
                @foreach ($country as $key => $coun)
                    <option>{{ $coun->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group ">
            {!! Form::selectYear('year', 2010, 2024, null, [
                'class' => 'form-control style_filter',
                'placeholder' => 'Năm phim',
            ]) !!}
        </div>
    </div>
    <div class="col-md-1">
        <input type="submit" value="Lọc phim" class="style_button_filter">
    </div>
</form>
