@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.addresses.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="customer">Customer </label>
                        <select name="customer_id" id="customer_id" class="form-control select2">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alias">Alias <span class="text-danger">*</span></label>
                        <input type="text" name="alias" id="alias" placeholder="Rumah atau Kantor" class="form-control" value="{{ old('alias') }}">
                    </div>
                    <div class="form-group">
                        <label for="address_1">Alamat 1 <span class="text-danger">*</span></label>
                        <input type="text" name="address_1" id="address_1" placeholder="Alamat 1" class="form-control" value="{{ old('address_1') }}">
                    </div>
                    <div class="form-group">
                        <label for="address_2">Alamat 2 </label>
                        <input type="text" name="address_2" id="address_2" placeholder="Alamat 2" class="form-control" value="{{ old('address_2') }}">
                    </div>
                    <div class="form-group">
                        <label for="country_id">Negara </label>
                        <select name="country_id" id="country_id" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="province_id">Provinsi </label>
                        <!--<select name="province_id" id="province_id" class="form-control" disabled>-->
                        <select name="province_id" id="province_id" class="form-control">
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="cities" class="form-group">
                        <label for="city_id">Kabupaten / Kota </label>
                        <!--<select name="city_id" id="city_id" class="form-control" disabled>-->
                        <select name="city_id" id="city_id" class="form-control">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zip">Kode Pos </label>
                        <input type="text" name="state_code" id="state_code" placeholder="Kode Pos" class="form-control" value="{{ old('state_code') }}">
                        
                    </div>
                     <div class="form-group">
                        <label for="zip">Telepon </label>
                        <input type="number" name="tlp" id="tlp" placeholder="Telepon" class="form-control" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Disable</option>
                            <option value="1">Enable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.addresses.index') }}" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#province_id').change(function () {

                var provinceId = $(this).val();

                $.ajax({
                    url: '/api/v1/country/169/province/' + provinceId + '/city',
                    contentType: 'json',
                    success: function (data) {

                        var html = '<label for="city_id">Kabupaten / Kota </label>';
                            html += '<select name="city_id" id="city_id" class="form-control">';
                            $(data.data).each(function (idx, v) {
                                html += '<option value="'+ v.id+'">'+ v.name +'</option>';
                            });
                            html += '</select>';

                        $('#cities').html(html).show();
                    },
                    errors: function (data) {
                        console.log(data);
                    }
                    
                });
            });
        });
    </script>
@endsection
