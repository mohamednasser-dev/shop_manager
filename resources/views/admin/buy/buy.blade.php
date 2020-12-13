@extends('admin_temp')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">{{trans('admin.nav_buy')}}</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{trans('admin.nav_buy')}}</li>
                <li class="breadcrumb-item active"><a href="{{url('home')}}" >{{trans('admin.nav_home')}}</a> </li>
            </ol>
        </div>
    </div>
        <!-- /.card-header -->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <!-- Headings -->
            <section id="html-headings-default" class="row match-height">
                <div class="col-sm-12 col-md-9">
                    <div class="card col-md-12">
                        <div class="card-body" style="height: 85px;">
                            <div class="card-block" style="margin-top: -40px;">
                                <!-- This form to add new news row in database -->
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{trans('admin.cust_name')}}</label>
                                    <div class="col-md-10">
                                      {{ Form::text('name',null,["class"=>"form-control center" ,"required"]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="card-block">
                                 <!-- This form to add new news row in database -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label>{{trans('admin.search_by_product_name')}}</label>
                                            {!! Form::text('name','',['class'=>'form-control center']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label>{{trans('admin.search_by_barcode')}}</label>
                                            {!! Form::text('barcode','',['class'=>'form-control center']) !!}
                                        </div>
                                    </div>
                                </div> 
                                <br>   
                                <br>   
                                <div class="row">
                                    <table id="myTable" class="table color-table warning-table">
                                        <thead>
                                            <tr>
                                                <th class="text-lg-center">{{trans('admin.product_name')}}</th>
                                                <th class="text-lg-center">{{trans('admin.barcode')}}</th>
                                                <th class="text-lg-center">{{trans('admin.quantity')}}</th>
                                                <th class="text-lg-center">{{trans('admin.price')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                        </tbody>
                                    </table> 
                                </div>      
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <div class="card-block">
                                 <!-- This form to add new news row in database -->
                                <table id="myTable" class="table full-color-table full-primary-table">
                                    <thead>
                                        <tr>
                                            <th class="text-lg-center">{{trans('admin.product_name')}}</th>
                                            <th class="text-lg-center">{{trans('admin.barcode')}}</th>
                                            <th class="text-lg-center">{{trans('admin.quantity')}}</th>
                                            <th class="text-lg-center">{{trans('admin.price')}}</th>
                                            <th class="text-lg-center">{{trans('admin.total')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                 
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <div class="card-block">
                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.date')}}</label>
                                        {!! Form::date('date',$today,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.bill_num')}}</label>
                                        {!! Form::text('bill_num','1',['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.total')}}</label>
                                        {!! Form::text('total','1000',['class'=>'form-control center']) !!}
                                    </div>
                                </div>

                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.pay')}}</label>
                                        {!! Form::text('pay','200',['class'=>'form-control center']) !!}
                                    </div>
                                </div>
                                <div class="row col-md-12" >
                                    <div>
                                        <label>{{trans('admin.remain')}}</label>
                                        {!! Form::text('remain','800',['class'=>'form-control center',]) !!}
                                    </div>
                                </div>
                                <br>
                                <div class="row col-md-12" >
                                    <button type="button" class="btn btn-rounded btn-block btn-success">{{trans('admin.public_Save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

