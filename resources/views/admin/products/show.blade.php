@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->

        @if($product)
        
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-2">Nama</td>
                            <td class="col-md-3">Deskripsi</td>
                            <td class="col-md-3">Cover</td>
                            <td class="col-md-2">Quantity</td>
                            <td class="col-md-2">Harga</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{!! $product->description !!}</td>
                                <td>
                                    @if(isset($product->cover))
                                        <!--<img src="{{asset("storage/$product->cover") }}" class="img-responsive" alt="">-->
                                        <img src="{{ asset("$product->cover") }}" class="img-responsive" alt="Produk image" >
                                    @endif
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td><!--{{ config('cart.currency') }}--> {{ number_format($product->price,2,",",".")  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        @endif
    
    </section>
    <!-- /.content -->
@endsection
