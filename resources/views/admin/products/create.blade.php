
@extends('layouts.admin.app')

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
         $('#price').autoNumeric('init');
    });
</script>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.products.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-8">
                        <h2>Produk</h2>
                        <div class="form-group">
                            <label for="sku">SKU <span class="text-danger">*</span></label>
                            <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="{{ old('sku') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi </label>
                            <textarea class="form-control" name="description" id="description" rows="5" placeholder="Deskripsi">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="cover">Cover </label>
                            <input type="file" name="cover" id="cover" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="image">Images</label>
                            <input type="file" name="image[]" id="image" class="form-control" multiple>
                            <small class="text-warning">Dapat Menggunakan tombol CTRL untuk memilih Gambar lebih dari satu</small>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Harga <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">RP</span>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
                            </div>
                        </div>
                        @if(!$brands->isEmpty())
                        <div class="form-group">
                            <label for="brand_id">Merk </label>
                            <select name="brand_id" id="brand_id" class="form-control select2">
                                <option value=""></option>
                                @foreach($brands as $brand)
                                    <option @if(old("brand_id") == $brand->id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        @include('admin.shared.status-select', ['status' => 0])
                        @include('admin.shared.attribute-select', [compact('default_weight')])
                    </div>
                    <div class="col-md-4">
                        <h2>Kategori</h2>
                        @include('admin.shared.categories', ['categories' => $categories, 'selectedIds' => []])
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
