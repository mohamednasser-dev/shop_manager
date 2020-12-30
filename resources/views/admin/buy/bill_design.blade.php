@extends('admin_temp')
@section('style')
@endsection
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.print_bill')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.print_bill')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('buy/part')}}">{{trans('admin.nav_buy_part')}}</a></li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}">{{trans('admin.nav_home')}}</a></li>
            </ol>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body printableArea">
                <h3><b>{{trans('admin.bill_buy')}}</b> <span class="pull-right">#{{$CustomerBill->bill_num}}</span></h3>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <address>
                                <h3> &nbsp;<b class="text-danger">{{$CustomerBill->Customer->name}}</b></h3>
                                <p class="text-muted m-l-5">{{$CustomerBill->Customer->address}}</p>
                                <p class="text-muted m-l-5">{{$CustomerBill->Customer->phone}}</p>
                                <p class="m-t-30"><b>{{trans('admin.bill_date')}}</b> <i class="fa fa-calendar"></i>{{$CustomerBill->date}}</p>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both; text-align: center;">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-lg-center">{{trans('admin.product_name')}}</th>
                                        <th class="text-lg-center">{{trans('admin.quantity')}}</th>
                                        <th class="text-lg-center">{{trans('admin.price')}}</th>
                                        <th class="text-lg-center">{{trans('admin.total')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($BillProduct as $product)
                                        <tr>
                                            <td class="text-lg-center">{{$product->name}}</td>
                                            <td class="text-lg-center">{{$product->quantity}}</td>
                                            <td class="text-lg-center">{{$product->price}}</td>
                                            <td class="text-lg-center">{{$product->total}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="pull m-t-30 " style="text-align: center">
                            <p>{{trans('admin.sale_total')}} $ {{$CustomerBill->total}}</p>
                            <p>{{trans('admin.sale_pay')}} $ {{$CustomerBill->pay}}</p>
                            <hr>
                            <h3><b>{{trans('admin.sale_remain')}}</b> $ {{$CustomerBill->remain}}</h3>
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <hr>
                    <div class="pull-left m-t-30 text-left">
                        <h3><b>{{trans('admin.bill_address')}} </b>{{trans('admin.bill_address_txt')}}</h3>
                        <h3><b>{{trans('admin.bill_phone')}}</b>{{trans('admin.bill_phone_txt')}}</h3>
                    </div>
                </div>
            </div>
            <div class="text-left">
                {{ Form::open( ['method'=>'post' ,'route'=>'back'] ) }}
                    {{ csrf_field() }}
                    <button id="print" class="btn btn-success" type="button"> <i class="fa fa-print"></i>{{trans('admin.print')}}</button>
                    <button  class="btn btn-default btn-outline" type="submit" id="back"> <span>{{trans('admin.back')}} </span> </button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('/js/jquery.PrintArea.js') }}" type="text/JavaScript"></script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
@endsection

